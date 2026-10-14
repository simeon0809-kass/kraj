//Activities js
function initCarousel(carouselId, dotsId) {
    const carousel = document.getElementById(carouselId);
    const dotsContainer = document.getElementById(dotsId);
    if (!carousel || !dotsContainer) return;

    const dots = dotsContainer.querySelectorAll('.dot');
    const cards = carousel.querySelectorAll('.snap-center');

    function updateDots() {
        const scrollLeft = carousel.scrollLeft;
        const cardWidth = cards[0].offsetWidth + 16; // card width + gap
        const index = Math.round(scrollLeft / cardWidth);
        dots.forEach((dot, i) => {
            dot.classList.toggle('active', i === index);
        });
    }

    carousel.addEventListener('scroll', updateDots, { passive: true });
    updateDots();
}

document.addEventListener('DOMContentLoaded', function () {
    initCarousel('carousel-most-read', 'dots-most-read');
    initCarousel('carousel-other', 'dots-other');
});

//Crafts js
const isMobile = () => window.innerWidth < 768;

function initGalleries() {
    document.querySelectorAll('.image-gallery').forEach(gallery => {
        const imgs = gallery.querySelectorAll('.gallery-img');

        // Remove old listeners by cloning and replacing
        imgs.forEach(img => {
            const newImg = img.cloneNode(true);
            img.parentNode.replaceChild(newImg, img);
        });

        // Re-select after cloning
        const newImgs = gallery.querySelectorAll('.gallery-img');

        // Find which image should be initially expanded (has w-125 class)
        let initialExpandedImg = null;
        newImgs.forEach(img => {
            if (img.classList.contains('w-125') || img.className.includes('w-125')) {
                initialExpandedImg = img;
            }
        });

        if (!isMobile()) {
            // Desktop: apply initial expansion and expand on hover
            if (initialExpandedImg) {
                initialExpandedImg.classList.add('expanded-desktop');
            }

            newImgs.forEach(img => {
                img.addEventListener('pointerenter', (e) => {
                    // Only respond to mouse hover, not touch
                    if (e.pointerType === 'mouse') {
                        newImgs.forEach(i => { i.classList.remove('expanded-desktop'); });
                        img.classList.add('expanded-desktop');
                    }
                });
            });

            gallery.addEventListener('pointerleave', (e) => {
                if (e.pointerType === 'mouse') {
                    newImgs.forEach(i => { i.classList.remove('expanded-desktop'); });
                    // Restore initial expansion on mouseleave
                    if (initialExpandedImg) {
                        initialExpandedImg.classList.add('expanded-desktop');
                    }
                }
            });
        } else {
            // Mobile: apply initial expansion and expand on click using expanded-mobile class
            if (initialExpandedImg) {
                initialExpandedImg.classList.add('expanded-mobile');
            }

            newImgs.forEach(img => {
                img.addEventListener('click', (e) => {
                    e.stopPropagation();
                    if (img.classList.contains('expanded-mobile')) {
                        img.classList.remove('expanded-mobile');
                    } else {
                        newImgs.forEach(i => i.classList.remove('expanded-mobile'));
                        img.classList.add('expanded-mobile');
                    }
                });
            });
        }
    });
}


initGalleries();

let resizeTimer;
window.addEventListener('resize', () => {
    clearTimeout(resizeTimer);
    resizeTimer = setTimeout(initGalleries, 300);
});

const backToTopBtn = document.getElementById('backToTop');
if (backToTopBtn) {
    backToTopBtn.addEventListener('click', (e) => {
        e.preventDefault();
        window.scrollTo({ top: 0, behavior: 'smooth' });
    });
}

//Products js

document.addEventListener('DOMContentLoaded', () => {
        const modal = document.getElementById('reserve-modal');
        const modalBox = document.getElementById('modal-box');
        const reserveBtns = document.querySelectorAll('.reserve-btn');
        const closeBtn = document.getElementById('close-modal');

        // Function to OPEN the modal with animation
        const openModal = () => {
            modal.classList.add('modal-overlay-active');
            modalBox.classList.add('modal-box-active');
        };

        // Function to CLOSE the modal
        const closeModal = () => {
            modal.classList.remove('modal-overlay-active');
            modalBox.classList.remove('modal-box-active');
        };

        // Listen for clicks on the reserve buttons
        reserveBtns.forEach(btn => {
            btn.addEventListener('click', openModal);
        });

        // Listen for clicks on the close buttons
        closeBtn.addEventListener('click', closeModal);

        // Close modal when clicking on the dark background
        modal.addEventListener('click', (e) => {
            if (e.target === modal) {
                closeModal();
            }
        });

        // Optional: Close modal with the 'Escape' key
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape' && modal.classList.contains('modal-overlay-active')) {
                closeModal();
            }
        });
    });