## Prompt

//I have in this folder a syllabus and a user-stories.md file. Your job is to look through the syllabus of my subject and see how things work, then look at the .md file where me and my colleages have summarized our projects. You can see 3 different sumirizations. Create a new user-stories .md file where you put everything together and we can use it to create our prioject//

# Idrizovo - Unified User Stories

## Product Goal

To build a web platform that simplifies prison visit management for families, visitors, and prison staff, with clear scheduling rules, approval workflow, and full history/audit support.

## Primary Roles

- Visitor (family member)
- Visitor (non-family applicant)
- Administrator
- Educator/Officer (Vospituvac)
- Invitation/Visit Approver

## Domain Rules

- Each inmate has a unique inmate number used during booking.
- Default visit allowance is 2 visits per inmate per month, unless admin changes it for a specific inmate or category.
- Default capacity is 15 visits per group.
- Default schedule is 1 group/day on working days and 3-4 groups/day on weekends and holidays.
- Default visit duration is 2 hours.
- Admin can override the number of groups per day, visit time slots, visitor capacity, visit duration, and inmate-specific visit limits.
- Open/Free treatment inmates may follow different tracking rules.
- Non-family visitors require a special request/approval.
- If a confirmed slot is canceled, the place becomes available for others.
- No-show visit counts as used visit.
- Cancellation/rejection by visitor must be at least 48 hours before visit start.
- All records must be retained.
- System must support 3 languages.
- Visit/group limits should be configurable for future policy changes.

## User Stories

### Epic A - Public Portal and Information

US-01 (P1)
As a visitor,
I want to see prison visit rules and house order,
so that I understand the process before booking.

Acceptance criteria:

- Public page shows visit rules, required documents, and cancellation rules.
- House order is visible and downloadable.

US-02 (P1)
As a visitor,
I want the website in 3 languages,
so that I can use it in my preferred language.

Acceptance criteria:

- Language switcher is available globally.
- Core content and booking flow are translated.

### Epic B - Visit Scheduling

US-03 (P1)
As a family visitor,
I want to request a visit by entering inmate number and my details,
so that I can schedule a legal visit.

Acceptance criteria:

- Required fields: name, surname, inmate number.
- Booking cannot proceed missing inmate number.

US-04 (P1)
As a visitor,
I want to see available groups and free slots,
so that I can choose a valid date/time.

Acceptance criteria:

- Availability reflects real-time capacity by group.
- System prevents overbooking past group capacity.

US-05 (P1)
As a system,
I want to enforce inmate-specific visit limits,
so that visit policy is respected.

Acceptance criteria:

- Default limit is 2 visits per inmate per month.
- Visit limits can vary by inmate profile, status, or category.
- Limit logic can be bypassed or configured for open/free treatment cases.

US-06 (P2)
As an administrator,
I want visit groups, time slots, and visitor capacity to be configurable,
so that policy changes do not require code changes.

Acceptance criteria:

- Admin can update groups per day, exact visit times, group capacity, visit duration, and monthly limits.
- If admin does not change them, the original defaults remain active.
- Changes apply only from configured effective date onward.

### Epic C - Approval Workflow

US-07 (P1)
As an approver/admin,
I want to approve or reject requests,
so that only valid visits are confirmed.

Acceptance criteria:

- Request status options: pending, approved, rejected, canceled, no-show, completed.
- Staff can filter requests by status/date/inmate.

### Epic D - Waitlist, Attendance, and History

US-11 (P1)
As staff,
I want to mark attendance/no-show after visit time,
so that monthly limits and records stay accurate.

Acceptance criteria:

- No-show can be recorded and counts as used visit.
- Completed visits and no-shows are stored in history.

US-13 (P1)
As admin/staff,
I want full historical records of all visit requests,
so that I can audit and report accurately.

Acceptance criteria:

- All state transitions are logged with timestamp and actor.
- Staff can search, filter, and export historical data.

### Epic E - Roles and Internal Content

US-14 (P2)
As an administrator,
I want full access to platform management,
so that I can control users, visits, and settings.

Acceptance criteria:

- Admin can manage users, permissions, requests, settings, and reports.

US-15 (P2)
As an educator/officer,
I want to post activities and program updates,
so that relevant information is visible internally/publicly as defined.

Acceptance criteria:

- Educator role can create, edit, and delete assigned announcements/posts.

## Non-Functional and Course Requirements

US-17 (P1)
As a project team,
we want responsive UI and stable functional beta before final delivery,
so that the platform is production-ready for presentation.

Acceptance criteria:

- Core features work on desktop and mobile.
- Major bugs are fixed before code-freeze milestone.

US-18 (P1)
As a project team,
we want mandatory AI usage evidence (Copilot prompts, before/after examples, accepted/rejected suggestions),
so that we satisfy course evaluation criteria.

Acceptance criteria:

- Repository includes AI usage log and prompt examples.
- Team can demonstrate how AI was used in coding, debugging, testing, and documentation.

US-19 (P1)
As a project team,
we want complete project documentation (README, user guide, setup, architecture notes),
so that mentors and evaluators can review our process and solution.

Acceptance criteria:

- Documentation is complete and up to date.
- Demo script and presentation checklist are prepared for final defense.

## Suggested MVP Scope

- US-01, US-02, US-03, US-04, US-05
- US-07, US-11, US-13
- US-14, US-15
- US-17, US-18, US-19

## Open Questions

- Is 48h cancellation policy fixed or should it vary by visit type?
- Exact meaning of "15 tables / 15 visits" in operational terms.
- How are open/free treatment inmates handled in reporting and compliance?
- Should non-family requests require extra document upload in v1?
