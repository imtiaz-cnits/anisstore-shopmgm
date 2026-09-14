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
- **Mobile & Tablet Page Background & Card Layout (মোবাইল ও ট্যাবলেট পেজ ব্যাকগ্রাউন্ড ও কার্ড নিয়ম):**
  - মোবাইল ও ট্যাবলেট ভিউতে (`max-width: 991.98px`) `.page-content` এর ব্যাকগ্রাউন্ড লাইট মোডে অবশ্যই সলিড সাদা (`#ffffff !important;`) হতে হবে (ডার্ক মোডে নির্ধারিত ডার্ক ব্যাকগ্রাউন্ড `#0f172a` বহাল থাকবে)।
  - পেজ কন্টেন্ট ও ডেটা টেবিলের মূল কার্ডে চারপাশের বর্ডার (Border), বর্ডার কালার (Border Color), এবং বক্স শ্যাডো সম্পূর্ণ রিমুভ (`border: 0 !important; border: none !important; border-color: transparent !important; box-shadow: none !important;`) রাখতে হবে। মোবাইল ও ট্যাবলেট ভিউতে `card-body` এর চারপাশের প্যাডিং `0` (`padding: 0 !important;`) এবং বর্ডার রেডিয়াস `0` (`border-radius: 0 !important;`) করতে হবে, যাতে অপ্রয়োজনীয় নেস্টেড প্যাডিং বা চারপাশে কোনো অনাকাঙ্ক্ষিত বর্ডার লাইন ছাড়া স্ক্রিনের সম্পূর্ণ উইডথ নিখুঁতভাবে ব্যবহৃত হয়।

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
  - **Date Format (তারিখের ফরম্যাট ও অ্যালাইনমেন্ট):** সকল তারিখ (Date) ফিল্ডে অবশ্যই **দিন-মাস-সাল (`d-m-Y` / `DD-MM-YYYY`)** ফরম্যাটে তারিখ বাম দিকে (Left-aligned) প্রদর্শিত হতে হবে (যেমন: `১৪-০৯-২০২৬` বা `14-09-2026`)। প্লেসহোল্ডার হবে `DD-MM-YYYY`।
  - **Universal Dark Mode Support:** প্রতিটি পেজের সকল ডেটপিকারে ডার্ক মোড সাপোর্ট বাধ্যতামূলক (`body[light-mode="dark"] .flatpickr-calendar`, `html[light-mode="dark"] .flatpickr-calendar`)। ডার্ক মোডে ক্যালেন্ডারের ব্যাকগ্রাউন্ড ডার্ক সারফেস (`#1e293b`), ডিপ পার্পল অ্যাকসেন্ট (`#672EB0`, `#532391`), এবং টেক্সট ক্লিয়ার হোয়াইট (`#f8fafc`) হতে হবে।
  - **High Z-Index & Modal Compatibility:** মডাল বা পপআপের ভিতরে যেন ক্যালেন্ডার নিচে চাপা না পড়ে, তার জন্য ক্যালেন্ডার পপআপের `z-index` পর্যাপ্ত পরিমাণে হাই (`105060` / `99999`) রাখতে হবে।
- **Numeric Input Restriction (সংখ্যা ইনপুট ফিল্ডের নিয়ম):** ইনপুট ফিল্ড সংখ্যা/নাম্বার হলে শুধুমাত্র নাম্বার বা ডিজিট টাইপ করা যাবে (English digits 0-9 and Bengali digits ০-৯, plus optional decimal point where applicable)। কোনো বর্ণমালা, অক্ষর বা চিহ্ন (letters/alphabetic characters/unwanted symbols) কোনোভাবেই টাইপ বা পেস্ট করা যাবে না। All numeric fields (e.g. price, quantity, phone number, charge, discount, amounts) must strictly enforce this rule.
- **Mobile Keyboard Behavior for Numeric vs Text Fields (মোবাইল কীবোর্ড নির্ধারণের নিয়ম):**
  - **Number / Price / Amount Fields:** ইনপুট ফিল্ড যদি সংখ্যা, মূল্য (price), মোট/সর্বমোট, পরিশোধ/পেলাম (amount), ডেলিভারি চার্জ, ছাড়, স্টক বা পরিমাণ (quantity), ব্যালেন্স ইত্যাদি সংখ্যা সম্পর্কিত হয়, তবে মোবাইল ভিউতে ইউজার ক্লিক করার সাথে সাথে ডিভাইসে শুধুমাত্র **নাম্বার কীবোর্ড (Numeric / Decimal Keypad)** ওপেন হতে হবে। এর জন্য ফিল্ডে অবশ্যই `inputmode="decimal"` (দশমিক সংখ্যা সাপোর্ট করার জন্য) অথবা `inputmode="numeric"` এবং সাথে `pattern="[0-9]*"` বাধ্যতামূলকভাবে যুক্ত করতে হবে যাতে iOS (iPhone / Safari) এবং Android উভয় অপারেটিং সিস্টেমে টেক্সট কীবোর্ডের পরিবর্তে স্বয়ংক্রিয়ভাবে সরাসরি নাম্বার প্যাড ওপেন হয়।
  - **Text Fields:** ইনপুট ফিল্ড যদি সাধারণ টেক্সট (যেমন: কাস্টমার নাম, পণ্যের নাম, ঠিকানা, বিবরণ/নোট, লেনদেন আইডি ইত্যাদি) হয়, তবে ইউজার যেন যেকোনো ভাষা, বর্ণ, শব্দ ও স্পেস স্বাভাবিকভাবে টাইপ করতে পারে তার জন্য স্ট্যান্ডার্ড টেক্সট কীবোর্ড (`type="text"` বা `<textarea>`, কোনো রেস্ট্রিক্টিভ ইনপুটমোড ছাড়া) বজায় রাখতে হবে।

## 6. Modal / Dialog Box Standardization (মডাল ও ডায়ালগ বক্সের সার্বজনীন স্ট্যান্ডার্ড)
- **Zero Window Scroll (ফুল স্ক্রিন স্ক্রল বন্ধ):** কোনো মডাল ওপেন হলে ব্যাকগ্রাউন্ড পেজ বা পুরো স্ক্রিন কোনোভাবেই স্ক্রল হবে না (`overflow: hidden !important;`).
- **Screen Centering & 10px Gap (স্ক্রিন সেন্টারিং ও চারপাশের ১০px গ্যাপ):**
  - মডাল সবসময় স্ক্রিনের ঠিক মাঝখানে (Center) থাকবে (`display: flex; align-items: center; justify-content: center;`).
  - স্ক্রিনের চারপাশ থেকে ১০px মার্জিন গ্যাপ থাকবে (`width: calc(100% - 20px) !important; max-width: calc(100% - 20px) !important; min-height: calc(100dvh - 20px) !important; margin: 10px auto !important;`).
  - কোনো ডুপ্লিকেট আউটার ডিভ (`modal-dialog` বা অতিরিক্ত র‍্যাপার) থাকবে না; সরাসরি ক্লিন সিঙ্গেল স্ট্রাকচার ব্যবহৃত হবে।
- **Overlay over Topbar on Mobile & Tab (টপবারের উপরে ওভারলে):**
  - মোবাইল ও ট্যাবলেট ভিউতে মডালের ব্যাকড্রপ/ওভারলে অবশ্যই টপবারের উপর দিয়ে প্রদর্শিত হবে (`z-index: 105050 !important;`).
- **Mobile Keyboard Adaptation (.keyboard-open):**
  - মোবাইল ডিভাইসে ইনপুট ফোকাস হলে (কীবোর্ড ওপেন হলে) মডাল কীবোর্ডের নিচে চাপা পড়বে না।
  - কীবোর্ড ওপেন হলে টপবারের উচ্চতার সমপরিমাণ (72px) গ্যাপ রেখে নিচে নেমে আসবে (`top: 72px !important; height: calc(100dvh - 72px - 10px) !important;`).
  - মডালের ভেতরের কন্টেন্ট স্মুথভাবে স্ক্রল হবে (`-webkit-overflow-scrolling: touch; overflow-y: auto;`).
- **Fixed Sticky Header & Footer:**
  - মডালের হেডার সবসময় রয়্যাল পার্পল (`#8C56D4`) ব্যাকগ্রাউন্ডে ফিক্সড/স্টিকি থাকবে এবং টেক্সট সাদা হবে।
  - মডালের ফুটার স্টিকি থাকবে এবং চারপাশের দেয়ালের সাথে লেগে থাকবে (নো সাইড গ্যাপ)।
  - ফুটারের অ্যাকশন বাটনগুলো পাশাপাশি (Side-by-side, 1 row) সমান উইডথে বিন্যস্ত থাকবে (`flex: 1;` বা `w-50`): সেভ/কনফার্ম বাটন রয়্যাল পার্পল (`#8C56D4`), বাতিল/ক্লোজ বাটন সফট রেড/গ্রে।
- **Fullscreen Slide-Up Modals (নতুন পার্টি, নতুন পণ্য ইত্যাদি):**
  - **Topbar Layout:** হেডার বার অবশ্যই ব্র্যান্ড পার্পল (`#8C56D4`) ব্যাকগ্রাউন্ড এবং সাদা টেক্সটে হবে। বামে ব্যাক আইকন (`fa-arrow-left`), সেন্টারে টাইটেল (যেমন: "নতুন পার্টি" / "নতুন পণ্য"), এবং ডানে অ্যাকশন বাটন / সাইন আইকন (`fa-check`) থাকবে যা ফর্ম সাবমিট করবে।
  - **Dark Mode Surface & Contrast:** ডার্ক মোডে মডাল ব্যাকগ্রাউন্ড সারফেস (`#121212`), ফর্ম কার্ড/ইনপুট ব্যাকগ্রাউন্ড (`#1e293b`), বর্ডার (`#334155`), টেক্সট (`#f8fafc`), আউটলাইন্ড ফ্লোটিং লেবেল ব্যাকগ্রাউন্ড (`#121212`) ও কালার (`#D2B7F1`), ফোকাস বর্ডার (`#8C56D4`), ফটো আপলোড বক্স (`#1e293b` ব্যাকগ্রাউন্ড এবং `#532391` ড্যাশড বর্ডার), এবং স্টিকি ফুটার (`#1e293b`) নিশ্চিত করতে হবে।

## 7. Master Invoice Design System & Universal Page Layout Standards (ইনভয়েস মাস্টার ডিজাইন ও সার্বজনীন পেজ লেআউট স্ট্যান্ডার্ড)

সকল বর্তমান ও ভবিষ্যৎ পেজে (যেমন: সেলস, পারচেজ, রিটার্ন, স্টক, কাস্টমার, সাপ্লায়ার, রিপোর্ট ইত্যাদি) ইনভয়েস পেজের হুবহু একই ভিজ্যুয়াল থিম, কালার প্যালেট, বাটন, কার্ড, মডাল এবং রেসপনসিভ লেআউট বজায় রাখতে হবে। **কোনো পেজের বিজনেস লজিক, ডাটাবেজ কোয়েরি বা রুট পরিবর্তন না করে শুধুমাত্র ডিজাইনের এই স্ট্যান্ডার্ড অনুসরণ করতে হবে।**

### 7.1 Page Header, Search & Toolbar Controls (পেজ হেডার, সার্চ ও টুলবার কন্ট্রোল)
- **Title Box:**
  - আইকন বক্স সাইজ: `width: 42px; height: 42px; border-radius: 8px; flex-shrink: 0;`
  - কালার: লাইট মোডে ব্যাকগ্রাউন্ড `#F3ECFB`, আইকন কালার `#8C56D4`, বর্ডার `1px solid #E5D5F7`। ডার্ক মোডে ব্যাকগ্রাউন্ড `#1e293b`, বর্ডার `#334155`।
  - টাইটেল হেডিং: `font-size: 20px; font-weight: 700;` ক্লিন গ্যাপ সহ সরাসরি আইকনের পাশে থাকবে।
- **Date Range Grid (তারিখ সিলেকশন গ্রিড):**
  - মোবাইল, ট্যাবলেট ও ডেস্কটপ সব ডিভাইসেই শুরুর তারিখ ও শেষের তারিখ **১ রো, ২ কলামে** থাকবে (`display: grid !important; grid-template-columns: 1fr 1fr !important; gap: 10px !important;`)।
  - ইনপুট হাইট ৪২px, রেডিয়াস ১০px, বামে তারিখ অ্যালাইন এবং ডানে ক্যালেন্ডার আইকন ক্লিকযোগ্য (`.calendar-addon-btn`)।
- **Search Button (অনুসন্ধান বাটন):**
  - সম্পূর্ণ উইডথ (`w-100`), হাইট ৪২px, রেডিয়াস ১০px।
  - ব্যাকগ্রাউন্ড: রয়্যাল পার্পল গ্রেডিয়েন্ট (`linear-gradient(135deg, #8C56D4 0%, #793FC5 100%) !important;`), টেক্সট সাদা, ফন্ট সাইজ ১৫px, বোল্ড, শ্যাডো `0 2px 8px rgba(140, 86, 212, 0.25)`।
- **Search Input (অনুসন্ধান ফিল্ড):**
  - হাইট ৪২px, রেডিয়াস ১০px, ডানে ম্যাগনিফাইং গ্লাস আইকন (`.invoice-search-addon-icon`)। ফোকাস বর্ডার `#8C56D4` এবং পার্পল রিং শ্যাডো।
- **Toolbar Action Buttons (এন্ট্রি, ফিল্টার, PDF, Print):**
  - সকল ড্রপডাউন এবং অ্যাকশন বাটনের উচ্চতা অভিন্ন ৪২px (`height: 42px; min-height: 42px;`) এবং রেডিয়াস ১০px।
  - রো ২ তে PDF (লাল আইকন `#dc2626`) ও Print (পার্পল আইকন `#8C56D4`) বাটন পাশাপাশি ১ রো, ২ কলাম গ্রিডে থাকবে (`grid-template-columns: 1fr 1fr; gap: 10px;`)।

### 7.2 Desktop Table View (>= 992px) (ডেস্কটপ টেবিল স্ট্যান্ডার্ড)
- **Table Structure:**
  - হেডার (`<thead>`): ব্যাকগ্রাউন্ড `#f8fafc`, টেক্সট `#475569`, বর্ডার `#e2e8f0`। ডার্ক মোডে ব্যাকগ্রাউন্ড `#0f172a`, টেক্সট `#cbd5e1`।
  - রো হোভার: হালকা পার্পল টিন্ট (`#FAF7FD`) ব্যাকগ্রাউন্ড।
  - ৩-ডটস অ্যাকশন ড্রপডাউন: মিনিমালিস্ট ড্রপডাউন, প্রতিটি আইটেমে রঙসহ প্রাসঙ্গিক আইকন (প্রিন্ট, ফেরত, বকেয়া, এডিট, ডিলিট)।
  - স্ট্যাটাস ব্যাজ: পরিশোধিত (`bg-success-subtle text-success`), বকেয়া (`bg-danger-subtle text-danger`), আংশিক (`bg-warning-subtle text-warning`)।

### 7.3 Mobile & Tablet Card Layout (< 992px) (মোবাইল ও ট্যাবলেট কার্ড লেআউট)
- **Card Sizing:**
  - মোবাইলে (`< 768px`): `col-12` (প্রতি রো-তে ১টি কার্ড)।
  - ট্যাবলেটে (`768px - 991.98px`): `col-md-6` (প্রতি রো-তে ২টি কার্ড পাশাপাশি)।
- **Card Container Styling:**
  - বর্ডার: `1.5px solid #E5D5F7 !important; border-radius: 14px !important;`
  - শ্যাডো: `box-shadow: 0 2px 10px rgba(140, 86, 212, 0.08) !important;`
  - প্যাডিং: `14px !important; margin-bottom: 4px !important;`
  - লাইট মোডে ব্যাকগ্রাউন্ড `#ffffff` এবং ডার্ক মোডে `#1e293b`।
  - সম্পূর্ণ কার্ড ক্লিকযোগ্য (`cursor: pointer;`) যা ট্যাপ করলে ইনভয়েস ভিউ ওপেন হবে।
- **Card Top Bar:**
  - বামে সিরিয়াল নং ব্যাজ (`#১`) এবং ইনভয়েস অর্ডার নং ব্যাজ (ফাইল আইকন সহ, ক্লিক করলে ইনভয়েস ওপেন হবে)।
  - ডানে রাউন্ডেড স্ট্যাটাস ব্যাজ (`পরিশোধিত` / `বকেয়া`)।
- **Customer & Date Info:**
  - কাস্টমার নাম পার্পল কালার (`#8C56D4`), বোল্ড, ইউজার সার্কেল আইকন সহ। কাস্টমার থাকলে ক্লিক করলে প্রোফাইলে যাবে (`event.stopPropagation()`)।
  - কাস্টমার আইডি ডানের ব্যাজে (`আইডি: CUST-1001`)।
  - নামের নিচে ক্যালেন্ডার আইকন সহ সুন্দর তারিখ ও প্রস্তুতকারক (`Admin` / `System`)।
- **2-Column Financial Summary Grid (৪টি আর্থিক বক্স):**
  - গ্রিড র‍্যাপার: `.invoice-summary-grid` (ব্যাকগ্রাউন্ড `#FAF7FD`, বর্ডার `#E5D5F7`, ক্লিক করলে প্রিন্ট ইনভয়েস ওপেন হবে)।
  - ৪টি বক্স: **মোট**, **ছাড়**, **পরিশোধ**, **বকেয়া**।
  - প্রতিটি বক্সের স্টাইল: `.invoice-price-box` (`p-2 rounded-2 border bg-white dark:bg-slate-800`).
  - **প্রাইসের ফন্ট সাইজ (Price Font Size):** অবশ্যই **১৮.৫px** এবং `font-weight: 800; line-height: 1.3; text-nowrap` হতে হবে।
  - **লেবেলের ফন্ট সাইজ (Label Font Size):** `12.5px; font-weight: 700;`।
  - **ক্লিক বিহেভিয়ার (Click Behavior):** বক্সগুলোতে ক্লিক বা ট্যাপ করার সাথে সাথে ইনভয়েসের প্রিন্ট পেজ (`/invoice/{id}`) ওপেন হবে।
  - **হোভার ও অ্যাকটিভ অ্যানিমেশন:** হোভার করলে পার্পল বর্ডার (`#8C56D4`), ব্যাকগ্রাউন্ড গ্লো এবং সামান্য লিফট ইফেক্ট (`transform: translateY(-1px); box-shadow: 0 3px 8px rgba(140, 86, 212, 0.15);`) থাকবে।
- **Action Buttons Strip (অ্যাকশন বাটন স্ট্রিপ):**
  - ৪টি বক্সের ঠিক নিচে হরিজন্টাল স্ট্রিপে সাজানো থাকবে (`.mobile-card-actions`).
  - বাটন সাইজ: হাইট ৩৬px, রেডিয়াস ৯px, সমান উইডথ (`flex: 1 1 0;`), সেন্টারড আইকন (সাইজ ১৪px)।
  - প্রতিটি বাটনের স্বাতন্ত্র্যসূচক কালার প্যালেট:
    - **প্রিন্ট বাটন:** ব্যাকগ্রাউন্ড `#F3ECFB`, কালার `#8C56D4`, বর্ডার `#E5D5F7`। হোভারে ব্যাকগ্রাউন্ড `#8C56D4`, কালার সাদা।
    - **পণ্য ফেরত বাটন:** ব্যাকগ্রাউন্ড `#FEF3C7`, কালার `#D97706`, বর্ডার `#FDE68A`। হোভারে ব্যাকগ্রাউন্ড `#D97706`, কালার সাদা।
    - **বকেয়া সংগ্রহ বাটন:** ব্যাকগ্রাউন্ড `#DCFCE7`, কালার `#16A34A`, বর্ডার `#BBF7D0`। হোভারে ব্যাকগ্রাউন্ড `#16A34A`, কালার সাদা।
    - **এডিট বাটন:** ব্যাকগ্রাউন্ড `#E0F2FE`, কালার `#0284C7`, বর্ডার `#BAE6FD`। হোভারে ব্যাকগ্রাউন্ড `#0284C7`, কালার সাদা।
    - **শেয়ার বাটন:** ব্যাকগ্রাউন্ড `#FAF5FF`, কালার `#7E22CE`, বর্ডার `#E9D5FF`। হোভারে ব্যাকগ্রাউন্ড `#7E22CE`, কালার সাদা।
    - **ডিলিট বাটন:** ব্যাকগ্রাউন্ড `#FEE2E2`, কালার `#DC2626`, বর্ডার `#FECACA`। হোভারে ব্যাকগ্রাউন্ড `#DC2626`, কালার সাদা।
  - অ্যাকশন বাটনে ক্লিক করলে যেন কার্ডের প্রিন্ট ভিউ ট্রিগার না হয়, সেজন্য কন্টেইনার এবং বাটনে `event.stopPropagation()` নিশ্চিত থাকবে।

### 7.4 Table-to-Box Transformation on Mobile (মোবাইলে প্রোডাক্ট টেবিল বক্স আকারে রূপান্তর)
- ফুল এডিট, রিটার্ন বা সেলস পেজে যেখানে একাধিক প্রোডাক্ট আইটেম থাকে, সেই টেবিল মোবাইল ভিউতে (`< 768px`) হরিজন্টাল স্ক্রল বা কেটে না গিয়ে কার্ড/বক্স আকারে রূপান্তর হতে হবে (`.mobile-item-box` / `.full-edit-mobile-item-box`)।
- বক্সের শীর্ষে প্রোডাক্টের নাম ও ক্যাটাগরি ব্যাজ থাকবে।
- নিচে পরিমাণ (Quantity), ইউনিট প্রাইস (Price), এবং মোট টাকা রেসপনসিভ ২/৩ কলাম গ্রিডে থাকবে এবং সাথে ডিলিট বাটন থাকবে।

### 7.5 Print View & Details Layout (প্রিন্ট ভিউ ও ডিটেইলস লেআউট)
- টপবারে ব্যাক বাটন, হেডিং এবং ডানে প্রিন্ট বাটন থাকবে।
- নিচের কন্ট্রোল বারে শেয়ার বাটন, পেপার সাইজ সিলেকশন (A4, POS/80mm) এবং প্রিন্ট বাটন পাশাপাশি থাকবে (`flex-nowrap`, ১ রো)।
- টেবিল ও রসিদের বর্ডারে কোনো অতিরিক্ত কালো দাগ থাকবে না; সফট ও ক্লিন বর্ডার কালার `#e2e8f0` (ডার্ক মোডে `#334155`) ব্যবহার করতে হবে।

### 7.6 Zero Logic Alteration Policy (জিরো লজিক পরিবর্তন নীতি)
- **কঠোর নিয়ম:** যেকোনো পেজের UI রূপান্তর করার সময় কন্ট্রোলার, মডেল, ডাটাবেজ স্কিমা, রিকোয়েস্ট ভ্যালিডেশন, API রুট বা জাভাস্ক্রিপ্ট ক্যালকুলেশন লজিকের কোনো পরিবর্তন করা যাবে না।
- শুধুমাত্র HTML টেমপ্লেট, CSS ক্লাস, রেসপনসিভ গ্রিড, ফন্ট সাইজ এবং মডাল লেআউট স্ট্যান্ডার্ডাইজ করতে হবে।

## 8. Dashboard Design, Icon Shapes, Floating Bar & Responsive Tables (ড্যাশবোর্ড ডিজাইন, আইকন শেপ ও বটম ফ্লোটিং বার স্ট্যান্ডার্ড)

### 8.1 Primary Metric Cards with Scooped Notch (স্কুপড নচ আইকন শেপ কার্ড)
- **কার্ড বর্ডার ও শেপ:** প্রতিটি কার্ডে নির্ধারিত সফট কালার বর্ডার থাকবে (মোট পাওনা: `#ffa39e`, মোট দেনা: `#91caff`, পণ্য: `#87e8de`, পার্টি: `#ffe58f`), কার্ডের বর্ডার রেডিয়াস ২০px।
- **স্কুপড নচ (Scooped Round Notch):** কার্ডের টপ-লেফটে সার্কুলার আইকন ব্যাজের নিচে ৬২×২৬px সাইজের SVG বেজিয়ার কার্ভ (`d="M 0,2 C 13,2 18,24 31,24 C 44,24 49,2 62,2"`) দিয়ে মসৃণ ও পারফেক্ট বৃত্তাকার নচ খাঁজ তৈরি করা হয়েছে এবং মাস্কের ব্যাকগ্রাউন্ড কার্ডের সাদা ব্যাকগ্রাউন্ডের সাথে ম্যাচিং রাখা হয়েছে।
- **আইকন ব্যাজ:** ৪২×৪২px সার্কুলার ব্যাজ, ভাইব্রেন্ট গ্রেডিয়েন্ট ব্যাকগ্রাউন্ড, ভেতরে পরিষ্কার সাদা আইকন (`color: #ffffff;`), খাঁজের ঠিক মাঝে এলিভেটেড অবস্থায় অবস্থান করবে।
- **রাইট অ্যারো:** কার্ডের ভ্যালুর সাথে ডানে রয়্যাল পার্পল বাটন অ্যারো (`fa-solid fa-arrow-right`, `#8C56D4`) থাকবে।

### 8.2 Secondary Detailed List Cards (সেকেন্ডারি ডিটেইল্ড লিস্ট কার্ড)
- **আইকন ব্যাজ শেপ:** সার্কেলের পরিবর্তে আধুনিক সফট স্কয়ার শেপ (`border-radius: 12px; width: 40px; height: 40px;`)।
- **প্যাডিং ও স্পেসিং:** কার্ডের ভেতরে ১০px প্যাডিং (`padding: 10px 14px;`) এবং কার্ডগুলোর মাঝে মার্জিন ১০px থাকবে।
- **রং বিন্যাস:**
  - মোট ব্যয়/খরচ: সফট রেড ব্যাকগ্রাউন্ড `#FFF1F0`, রেড আইকন `#FF4D4F`
  - মোট স্টক: সফট ব্লু ব্যাকগ্রাউন্ড `#E6F4FF`, ব্লু কার্ট আইকন `#1677FF`
  - স্টক মূল্য: সফট অ্যাম্বার ব্যাকগ্রাউন্ড `#FFFBE6`, অ্যাম্বার ওয়ালেট আইকন `#FAAD14`
- **টেক্সট ও অ্যারো:** ভ্যালু হবে স্পষ্ট ডার্ক বোল্ড টেক্সট এবং ডানে পার্পল শেভ্রন অ্যারো (`fa-solid fa-chevron-right`, `#8C56D4`) থাকবে।

### 8.3 Dashboard Tables Mobile & Tablet Box Type & 10px Compact Spacing (ড্যাশবোর্ড টেবিল বক্স টাইপ ও ১০px স্পেসিং)
- **ডেস্কটপ (>= 992px):** রেগুলার টেবিল ভিউ (`d-none d-lg-block`) সক্রিয় থাকবে।
- **মোবাইল ও ট্যাবলেট (< 992px):** টেবিল লুকিয়ে বক্স/কার্ড গ্রিড (`d-lg-none`) প্রদর্শিত হবে:
  - **মোবাইল ভিউতে (< 768px):** প্রতি রো-তে **১টি করে কার্ড/বক্স** (`col-12`) প্রদর্শিত হবে।
  - **ট্যাবলেট ভিউতে (768px - 991.98px):** প্রতি রো-তে **২টি করে কার্ড/বক্স পাশাপাশি** (`col-md-6`) প্রদর্শিত হবে।
- **কার্ড প্যাডিং ও মার্জিন:** কার্ডের ভেতরে সুনির্দিষ্ট **১০px প্যাডিং** (`padding: 10px 12px;`) এবং নিচে অতিরিক্ত ফাঁকা জায়গা দূর করে কার্ড ও সেকশনের মধ্যে স্ট্যান্ডার্ড **১০px গ্যাপ** রাখা হবে।
- **গ্রিন কালার সাবস্টিটিউশন:** পেজের সবুজ কালার উপাদানসমূহ (যেমন ফিল্টার আইকন, লাইভ ব্যাজ, পরিশোধিত স্ট্যাটাস ব্যাজ, চার্ট হাইলাইট ও ইনভয়েস লিঙ্ক) প্রাইমারি পার্পল (`#8C56D4` / `#F3ECFB`) এ রূপান্তর করতে হবে।

### 8.4 Bottom Floating Action Bar with Clip-Path Notch (বটম ফ্লোটিং অ্যাকশন বার ও ক্লিপ-পাথ নচ)
- **উচ্চতা ও পজিশন:** স্ক্রিনের নিচে ফিক্সড স্টিকি বার, উচ্চতা ৭৪px, ব্যাকগ্রাউন্ড সাদা (`#ffffff`, ডার্ক মোডে `#0f172a`)।
- **সফট ড্রপ-শ্যাডো (Drop Shadow Wrapper):** ক্লিপ-পাথ ব্যবহার করায় সাধারণ `box-shadow` কেটে যায়; তাই প্যারেন্ট র‍্যাপার `.mobile-bottom-nav-wrapper`-এ `filter: drop-shadow(0 -5px 16px rgba(140, 86, 212, 0.16)) drop-shadow(0 -2px 6px rgba(0, 0, 0, 0.05))` ব্যবহার করা হয়েছে যাতে কার্ভড খাঁজসহ পুরো বারের চারপাশে হালকা সফট শ্যাডো ফুটে ওঠে।
- **মসৃণ গোলাকার ক্লিপ-পাথ কার্ভড নচ (Smooth Rounded Clip-Path Notch):** বারের টপ-সেন্টারে একটি প্রশস্ত ও পারফেক্ট অর্ধবৃত্তাকার খাঁজ থাকবে যা SVG `clipPath` (`#hishabBottomNavClip`) এর স্মুথ বেজিয়ার কার্ভ (`C 0.41,0 0.435,0.56 0.5,0.56 C 0.565,0.56 0.59,0 0.64,0`) দ্বারা গঠিত।
- **সেন্টার প্লাস বাটন (+):** ৫৪×৫৪px সার্কুলার প্লাস বাটন, সাদা ব্যাকগ্রাউন্ড, ৩.৫px পার্পল রিং বর্ডার (`#d6bbfb`), পার্পল প্লাস আইকন (`#8C56D4`), ক্লিপ-পাথ এলিমেন্টের বাইরে র‍্যাপারে `position: absolute; top: -18px; left: 50%; transform: translateX(-50%);` থাকায় এটি কখনো কেটে বা ভেতরে ডুবে যাবে না; বরং খাঁজের ঠিক মাঝে সুন্দরভাবে এলিভেটেড অবস্থায় ভেসে থাকবে।
- **অ্যাকশন পিল বাটনসমূহ:**
  - বামে **কিনুন** বাটন: রয়্যাল পার্পল গ্রেডিয়েন্ট (`linear-gradient(135deg, #a855f7 0%, #8C56D4 100%)`), ক্যাশ আইকন।
  - ডানে **বিক্রি করুন** বাটন: ভাইব্রেন্ট ব্লু গ্রেডিয়েন্ট (`linear-gradient(135deg, #38bdf8 0%, #2563eb 100%)`), পিওএস ক্যাশ রেজিস্টার আইকন।

### 8.5 Filter Bar & Horizontal Scrolling Standards (ফিল্টার বার ও স্ক্রলিং স্ট্যান্ডার্ড)
- **আইকন:** পার্পল স্লাইডার/ফিল্টার আইকন (`#8C56D4`) ব্যবহার হবে।
- **হরিজন্টাল স্ক্রল:** মোবাইল ও ট্যাবলেটে স্মুথ স্ক্রলিং সক্রিয় থাকবে (`overflow-x: auto; -webkit-overflow-scrolling: touch; flex-wrap: nowrap; white-space: nowrap; scroll-behavior: smooth;`), কিন্তু কোনো ডিফল্ট স্ক্রলবার দৃশ্যমান হবে না (`scrollbar-width: none; &::-webkit-scrollbar { display: none; }`)।


