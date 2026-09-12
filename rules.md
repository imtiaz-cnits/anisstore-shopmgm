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

## 6. Modal / Dialog Box Standardization
- **Height & Viewport:** Modals must fit within a maximum of `100vh` (viewport height).
- **Structure:** 
  - The Modal Header/Heading MUST have the primary background color.
  - The Modal Header and Footer MUST be fixed/sticky (always visible).
  - Only the internal body content area of the modal should be scrollable.
- **Action Buttons:** 
  - Submit/Action buttons MUST use the primary background color.
  - Cancel/Close buttons MUST use a Red background color.
