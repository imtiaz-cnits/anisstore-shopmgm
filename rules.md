# AI Agent Directives & Project Rules

This `rules.md` file contains the strict guidelines and conventions for this project. The AI agent must read and follow these rules before executing any prompt. If any new global design pattern or rule is introduced during development, the AI agent MUST update this `rules.md` file accordingly.

## 1. Core Development & Logic
- **Preserve Existing Logic:** NEVER alter, break, or remove core business logic, functions, or database operations unless explicitly requested.
- **Preserve Custom Code:** Do not overwrite or remove custom-written code by replacing it with default or boilerplate code. 
- **Zero Breakage:** Ensure that UI changes do not cause functional errors or break other connected logic. The code must be error-free.
- **Professional & Reusable:** Write clean, modular, and professional code. Create reusable components wherever possible.

## 2. Tech Stack & Styling Guidelines
- **Existing CSS:** Keep all existing custom CSS files intact. 
- **Tailwind CSS v4:** Install and strictly use Tailwind CSS v4 for all new styling and redesign tasks. 
- **Primary Brand Color & Palette (#8C56D4):**
  - The project brand primary color is **Royal Purple (`#8C56D4`)**.
  - **Full Purple Shades Palette:**
    - `purple-50`: `#FAF7FD` (Ultra-light background tint, hover badges)
    - `purple-100`: `#F3ECFB` (Soft pill backgrounds, light button states)
    - `purple-200`: `#E5D5F7` (Borders, subtle dividers, accent outlines)
    - `purple-300`: `#D2B7F1` (Icon highlights, secondary text on dark surfaces)
    - `purple-400`: `#B48BE8` (Vibrant accent borders, active indicator lines)
    - `purple-500`: `#8C56D4` (**Main Primary Brand Color**)
    - `purple-600`: `#793FC5` (Primary hover states, active button gradients)
    - `purple-700`: `#672EB0` (Deep purple, gradient stops)
    - `purple-800`: `#532391` (Rich dark purple, sidebar midtone)
    - `purple-900`: `#3E1870` (Dark luxury purple, sidebar container base)
    - `purple-950`: `#260B4A` (Midnight royal purple, sidebar header & footer)
- **Variable-Based Theming:** Use CSS variables (integrated with Tailwind classes) for primary colors, backgrounds, and border colors to maintain a dynamic and easily changeable theme.
- **Dark Mode:** Dark mode must be strictly consistent across all pages. Maintain uniform hover effects, background colors, border colors, and smooth transitions.

## 3. Global Design & UI Consistency
- **Primary Focus:** The main objective of current tasks is UI/UX redesign and standardizing the interface.
- **Consistency:** Maintain exact consistency across all pages for primary colors, border colors, button colors, button sizes, font sizes, and page layouts.
- **Color Replacement:** Replace all previous green/emerald themes with the new `#8C56D4` purple shade system across sidebars, active menu links, buttons, headers, and UI cards.
- **Language Constraint (Strict):** ALL user-facing text, content, and placeholders MUST be in the Bengali language (বাংলা). NO English text should be visible in the UI.

## 4. Responsiveness (Mobile-First)
- **Priority:** Mobile and Tablet views are the highest priority (Mobile-first approach). 
- **Desktop:** Ensure flawless scaling and responsiveness for Desktop views only after Mobile and Tablet views are perfected.

## 5. Form Elements (Inputs, Selects, Buttons)
- **Standardization:** All input fields, select boxes, date pickers, and search fields MUST have the exact same size, padding, and height.
- **Focus State:** Apply the primary brand color to the border when any input or form element is focused.
- **Cursor:** Ensure `cursor-pointer` is applied to all buttons, links, and select elements.
- **Modern Dropdowns:** Remove default browser select styles. Implement modern dropdown designs.
- **Searchable Selects:** For category-type or long-list dropdowns, always implement a searchable filter inside the dropdown.
- **Date Pickers:** Do not use the default browser date input. Integrate a high-quality, modern calendar/datepicker UI.
- **Flatpickr Calendar Standardization (ক্যালেন্ডার ও তারিখ ফিল্ডের নিয়ম):**
  - **No Default Browser Date Inputs:** কোনো অবস্থাতেই ব্রাউজারের ডিফল্ট `type="date"` ইনপুট ব্যবহার করা যাবে না। সকল তারিখ (Date) ফিল্ডে অবশ্যই কাস্টমাইজড **Flatpickr** ক্যালেন্ডার ব্যবহার করতে হবে (`disableMobile: true`)।
  - **Month Navigation (মাস পরিবর্তন):** ক্যালেন্ডারে কোনো Month Dropdown থাকবে না (`monthSelectorType: "static"`), শুধুমাত্র Previous এবং Next অ্যারো বাটন দিয়ে মাস পরিবর্তন হবে।
  - **Royal Purple Theme & Bengali Numerals:** ক্যালেন্ডারের হেডার ও সিলেকশন অবশ্যই রয়্যাল পার্পল কালার প্যালেট (`#8C56D4`, `#793FC5`) অনুযায়ী হবে এবং তারিখ বাংলা সংখ্যায় (০-৯) ফরম্যাটিং ও পার্সিং সঠিকভাবে সাপোর্ট করবে।
  - **Universal Dark Mode Support:** প্রতিটি পেজের সকল ডেটপিকারে ডার্ক মোড সাপোর্ট বাধ্যতামূলক (`body[light-mode="dark"] .flatpickr-calendar`, `html[light-mode="dark"] .flatpickr-calendar`)। ডার্ক মোডে ক্যালেন্ডারের ব্যাকগ্রাউন্ড ডার্ক সারফেস (`#1e293b`), ডিপ পার্পল অ্যাকসেন্ট (`#672EB0`, `#532391`), এবং টেক্সট ক্লিয়ার হোয়াইট (`#f8fafc`) হতে হবে।
  - **High Z-Index & Modal Compatibility:** মডাল বা পপআপের ভিতরে যেন ক্যালেন্ডার নিচে চাপা না পড়ে, তার জন্য ক্যালেন্ডার পপআপের `z-index` পর্যাপ্ত পরিমাণে হাই (`105060` / `99999`) রাখতে হবে।
- **Numeric Input Restriction (সংখ্যা ইনপুট ফিল্ডের নিয়ম):** ইনপুট ফিল্ড সংখ্যা/নাম্বার হলে শুধুমাত্র নাম্বার বা ডিজিট টাইপ করা যাবে (English digits 0-9 and Bengali digits ০-৯, plus optional decimal point where applicable)। কোনো বর্ণমালা, অক্ষর বা চিহ্ন (letters/alphabetic characters/unwanted symbols) কোনোভাবেই টাইপ বা পেস্ট করা যাবে না। All numeric fields (e.g. price, quantity, phone number, charge, discount, amounts) must strictly enforce this rule.

## 6. Modal / Dialog Box Standardization
- **Height & Viewport:** Modals must fit within a maximum of `100vh` (viewport height).
- **Structure:** 
  - The Modal Header/Heading MUST have the primary background color (`#8C56D4`).
  - The Modal Header and Footer MUST be fixed/sticky (always visible).
  - Only the internal body content area of the modal should be scrollable.
- **Action Buttons:** 
  - Submit/Action buttons MUST use the primary brand background color (`#8C56D4`).
  - Cancel/Close buttons MUST use a Red background color.
- **Fullscreen Slide-Up Modals (নতুন পার্টি, নতুন পণ্য ইত্যাদি):**
  - **Topbar Layout:** হেডার বার অবশ্যই ব্র্যান্ড পার্পল (`#8C56D4`) ব্যাকগ্রাউন্ড এবং সাদা টেক্সটে হবে। বামে ব্যাক আইকন (`fa-arrow-left`), সেন্টারে টাইটেল (যেমন: "নতুন পার্টি" / "নতুন পণ্য"), এবং ডানে অ্যাকশন বাটন / সাইন আইকন (`fa-check`) থাকবে যা ফর্ম সাবমিট করবে।
  - **Dark Mode Surface & Contrast:** ডার্ক মোডে মডাল ব্যাকগ্রাউন্ড সারফেস (`#121212`), ফর্ম কার্ড/ইনপুট ব্যাকগ্রাউন্ড (`#1e293b`), বর্ডার (`#334155`), টেক্সট (`#f8fafc`), আউটলাইন্ড ফ্লোটিং লেবেল ব্যাকগ্রাউন্ড (`#121212`) ও কালার (`#D2B7F1`), ফোকাস বর্ডার (`#8C56D4`), ফটো আপলোড বক্স (`#1e293b` ব্যাকগ্রাউন্ড এবং `#532391` ড্যাশড বর্ডার), এবং স্টিকি ফুটার (`#1e293b`) নিশ্চিত করতে হবে।

