<x-guardLayout.app>
    <div class="min-h-screen bg-figma-gradient text-gray-900 p-6 font-sans">
        <div class="flex flex-col md:flex-row justify-between items-center text-center md:text-left gap-y-5 bg-white p-5 rounded-xl shadow-sm mb-8 border border-gray-100">
            <div class="flex flex-col md:flex-row items-center gap-4">
                <img src="{{asset('icons/rsm_color.svg')}}" alt="" class="h-10 w-10">
                <div>
                    <h1 class="text-lg font-bold tracking-wide uppercase text-[#214072]">Безбедносен Панел</h1>
                    <p class="text-[#2b5a97] text-xs font-bold uppercase"><i class="fas fa-circle text-[8px] mr-1"></i> Системот е активен</p>
                </div>
            </div>
            
            <form method="POST" action="{{ route('guard.logout') }}">
                @csrf
                <button class="border border-gray-200 text-gray-600 hover:bg-gray-50 hover:text-red-600 px-5 py-2 rounded-lg font-medium text-lg transition-colors">
                    Одјави се
                </button>
            </form>
        </div>

        <div class="max-w-3xl mx-auto bg-white p-8 lg:p-12 rounded-xl shadow-lg border border-gray-100 text-center mt-6">
            <h2 class="text-gray-500 font-bold uppercase tracking-wider mb-6 text-sm">Внесете код за посета</h2>
            
            <input type="text" id="pin-input" maxlength="5" autocomplete="off" placeholder="00000"
                class="w-full max-w-sm bg-gray-50 border-2 border-gray-200 text-center text-6xl font-black tracking-[0.2em] text-[#214072] py-6 rounded-lg focus:outline-none focus:border-[#2b5a97] focus:ring-4 focus:ring-[#2b5a97]/20 transition-all placeholder-gray-300 mb-6">
            
            <div id="status-message" class="text-lg font-medium h-8 mb-6"></div>

            <div id="result-card" class="hidden bg-gray-50 rounded-xl border border-gray-200 p-6 lg:p-8 text-left">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8 border-b border-gray-200 pb-8">
                    <div>
                        <p class="text-gray-500 text-xs font-bold uppercase tracking-wider mb-1">Посетител(и)</p>
                        <p id="res-visitors" class="text-xl font-bold text-gray-900"></p>
                    </div>
                    <div>
                        <p class="text-gray-500 text-xs font-bold uppercase tracking-wider mb-1">Затвореник ID</p>
                        <p id="res-prisoner" class="text-xl font-black text-[#2b5a97]"></p>
                    </div>
                </div>

                <div class="mb-8">
                    <div id="res-children-box" class="mb-6 pb-6 border-b border-gray-200 hidden">
                        <p class="text-[#2b5a97] text-xs font-bold uppercase tracking-wider mb-2">
                            <i class="fas fa-child mr-1"></i> Children's Corner Активиран
                        </p>
                        <p id="res-children" class="text-base text-gray-800 font-medium"></p>
                    </div>

                    <div>
                        <p class="text-[#214072] text-xs font-bold uppercase tracking-wider mb-3">
                            <i class="fas fa-box-open mr-1"></i> Пријавени предмети за проверка
                        </p>
                        <div id="res-items" class="flex flex-wrap gap-2"></div>
                    </div>
                </div>

                <button id="mark-attended-btn" class="w-full bg-[#2b5a97] hover:bg-[#214072] text-white font-bold text-lg tracking-wide py-4 rounded-lg transition-colors flex justify-center items-center gap-2">
                    ПОТВРДИ ПРИСУСТВО <i class="fas fa-check"></i>
                </button>
            </div>
        </div>
    </div>

    <script>
        const pinInput = document.getElementById('pin-input');
        const statusMsg = document.getElementById('status-message');
        const resultCard = document.getElementById('result-card');
        let currentVisitId = null;

        pinInput.addEventListener('input', function() {
            this.value = this.value.replace(/[^0-9]/g, '');
            
            if (this.value.length === 5) {
                checkPin(this.value);
            } else {
                resultCard.classList.add('hidden');
                statusMsg.innerHTML = '';
                pinInput.classList.remove('border-[#2b5a97]', 'border-red-500', 'bg-red-50', 'bg-blue-50');
                pinInput.classList.add('border-gray-200', 'bg-gray-50');
            }
        });

        async function checkPin(pin) {
            statusMsg.innerHTML = '<span class="text-[#2b5a97]"><i class="fas fa-spinner fa-spin mr-2"></i>Се проверува...</span>';
            
            try {
                const response = await fetch('{{ route("guard.checkPin") }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({ pin: pin })
                });
                
                const data = await response.json();

                if (data.status === 'error') {
                    statusMsg.innerHTML = `<span class="text-red-600 font-bold"><i class="fas fa-times-circle mr-1"></i> ${data.message}</span>`;
                    pinInput.classList.remove('border-gray-200', 'border-[#2b5a97]', 'bg-gray-50', 'bg-blue-50');
                    pinInput.classList.add('border-red-500', 'bg-red-50');
                    resultCard.classList.add('hidden');
                } else {
                    const visit = data.visit;
                    currentVisitId = visit.id;

                    statusMsg.innerHTML = '<span class="text-[#2b5a97] font-bold"><i class="fas fa-check-circle mr-1"></i> ВАЛИДЕН КОД ЗА ДЕНЕС</span>';
                    pinInput.classList.remove('border-gray-200', 'border-red-500', 'bg-gray-50', 'bg-red-50');
                    pinInput.classList.add('border-[#2b5a97]', 'bg-blue-50');

                    document.getElementById('res-visitors').innerText = visit.visitors;
                    document.getElementById('res-prisoner').innerText = visit.prisoner_num;

                    const childBox = document.getElementById('res-children-box');
                    if (visit.has_children) {
                        childBox.classList.remove('hidden');
                        document.getElementById('res-children').innerText = visit.children_names;
                    } else {
                        childBox.classList.add('hidden');
                    }

                    const itemsContainer = document.getElementById('res-items');
                    itemsContainer.innerHTML = '';
                    if (visit.declared_items && visit.declared_items.length > 0) {
                        visit.declared_items.forEach(item => {
                            const badge = document.createElement('span');
                            badge.className = 'bg-white border border-gray-300 text-gray-700 px-3 py-1.5 rounded-md text-sm font-medium shadow-sm';
                            badge.innerText = item;
                            itemsContainer.appendChild(badge);
                        });
                    } else {
                        itemsContainer.innerHTML = '<span class="text-gray-400 italic text-sm">Нема пријавено предмети.</span>';
                    }

                    resultCard.classList.remove('hidden');
                }
            } catch (error) {
                statusMsg.innerHTML = '<span class="text-red-600 font-bold">Грешка во серверот.</span>';
            }
        }

        document.getElementById('mark-attended-btn').addEventListener('click', async function() {
            if (!currentVisitId) return;

            this.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i> СЕ СНИМА...';
            this.disabled = true;

            try {
                const response = await fetch(`/guard/mark-attended/${currentVisitId}`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                });

                const data = await response.json();

                if (data.status === 'success') {
                    resultCard.innerHTML = `
                        <div class="text-center py-10">
                            <div class="w-16 h-16 bg-green-100 text-green-600 rounded-full flex items-center justify-center mx-auto mb-4">
                                <i class="fas fa-check text-3xl"></i>
                            </div>
                            <h3 class="text-2xl font-bold text-gray-900 mb-2">Присуството е потврдено</h3>
                            <p class="text-gray-500 text-sm">Посетата е успешно архивирана во системот.</p>
                        </div>
                    `;
                    
                    setTimeout(() => {
                        window.location.reload();
                    }, 3000);
                }
            } catch (error) {
                this.innerHTML = 'ГРЕШКА. ОБИДЕТЕ СЕ ПОВТОРНО.';
                this.disabled = false;
            }
        });
    </script>
</x-guardLayout.app>