# 🎬 Scroll Animation Guide

## ✨ Overview

Website sekarang dilengkapi dengan sistem animasi scroll yang smooth dan modern menggunakan **Intersection Observer API**. Elemen akan muncul dengan animasi yang indah saat di-scroll.

---

## 🎯 Cara Menggunakan

### Basic Usage

Tambahkan attribute `data-scroll` ke elemen HTML yang ingin diberi animasi:

```html
<div data-scroll="fade-up">
    Content akan muncul dengan animasi fade-up
</div>
```

---

## 🎨 Jenis Animasi yang Tersedia

### 1. **Fade Up** (Paling Umum)
```html
<div data-scroll="fade-up">
    Muncul dari bawah sambil fade in
</div>
```
✅ **Best for**: Cards, sections, text blocks

---

### 2. **Fade Down**
```html
<div data-scroll="fade-down">
    Muncul dari atas sambil fade in
</div>
```
✅ **Best for**: Headers, titles, top banners

---

### 3. **Fade Left**
```html
<div data-scroll="fade-left">
    Muncul dari kanan sambil fade in
</div>
```
✅ **Best for**: Content from right, images

---

### 4. **Fade Right**
```html
<div data-scroll="fade-right">
    Muncul dari kiri sambil fade in
</div>
```
✅ **Best for**: Content from left, sidebars

---

### 5. **Zoom In**
```html
<div data-scroll="zoom-in">
    Muncul dengan efek zoom in
</div>
```
✅ **Best for**: Images, icons, important cards

---

### 6. **Zoom Out**
```html
<div data-scroll="zoom-out">
    Muncul dengan efek zoom out
</div>
```
✅ **Best for**: Hero sections, large images

---

### 7. **Rotate**
```html
<div data-scroll="rotate">
    Muncul dengan efek rotasi
</div>
```
✅ **Best for**: Fun elements, decorative items

---

### 8. **Flip Left**
```html
<div data-scroll="flip-left">
    Muncul dengan efek flip dari kiri
</div>
```
✅ **Best for**: Cards, special elements

---

## ⏱️ Animation Delays

Tambahkan delay untuk membuat animasi berurutan:

```html
<div data-scroll="fade-up" data-scroll-delay="100">Item 1</div>
<div data-scroll="fade-up" data-scroll-delay="200">Item 2</div>
<div data-scroll="fade-up" data-scroll-delay="300">Item 3</div>
```

**Delay Options**: 100, 200, 300, 400, 500, 600, 700, 800 (in milliseconds)

### Example: Staggered Cards
```html
<div class="grid grid-cols-3 gap-6">
    @foreach($items as $item)
    <div data-scroll="fade-up" data-scroll-delay="{{ $loop->index * 100 }}">
        {{ $item->name }}
    </div>
    @endforeach
</div>
```

---

## ⏳ Animation Duration

Ubah kecepatan animasi:

```html
<!-- Slow (1.2s) -->
<div data-scroll="fade-up" data-scroll-duration="slow">
    Animasi lambat
</div>

<!-- Fast (0.5s) -->
<div data-scroll="fade-up" data-scroll-duration="fast">
    Animasi cepat
</div>

<!-- Default (0.8s) -->
<div data-scroll="fade-up">
    Kecepatan normal
</div>
```

---

## 🎯 Contoh Implementasi

### Example 1: Hero Section
```html
<section class="hero">
    <h1 data-scroll="fade-up">Welcome</h1>
    <p data-scroll="fade-up" data-scroll-delay="100">
        Your tagline here
    </p>
    <button data-scroll="fade-up" data-scroll-delay="200">
        Get Started
    </button>
</section>
```

---

### Example 2: Product Cards
```html
<div class="grid grid-cols-3 gap-6">
    @foreach($products as $product)
    <div class="card" 
         data-scroll="fade-up" 
         data-scroll-delay="{{ ($loop->index % 3) * 100 }}">
        <img src="{{ $product->image }}" alt="">
        <h3>{{ $product->name }}</h3>
        <p>{{ $product->price }}</p>
    </div>
    @endforeach
</div>
```

---

### Example 3: Feature Section
```html
<section class="features">
    <div class="container">
        <h2 data-scroll="fade-up">Our Features</h2>
        
        <div class="grid grid-cols-3 gap-8">
            <div data-scroll="fade-right" data-scroll-delay="100">
                Feature 1
            </div>
            <div data-scroll="zoom-in" data-scroll-delay="200">
                Feature 2
            </div>
            <div data-scroll="fade-left" data-scroll-delay="300">
                Feature 3
            </div>
        </div>
    </div>
</section>
```

---

### Example 4: Testimonials
```html
<div class="testimonials">
    @foreach($testimonials as $testimonial)
    <div class="testimonial" 
         data-scroll="flip-left" 
         data-scroll-delay="{{ $loop->index * 150 }}"
         data-scroll-duration="slow">
        <p>{{ $testimonial->quote }}</p>
        <span>{{ $testimonial->author }}</span>
    </div>
    @endforeach
</div>
```

---

## 🔄 Livewire Support

Animasi scroll otomatis bekerja dengan Livewire! Event listener `livewire:navigated` sudah diatur untuk re-initialize animasi saat konten di-load secara dinamis.

---

## 🎨 File yang Sudah Diupdate dengan Animasi

### ✅ Home Page
- **Hero Section** (`hero.blade.php`)
  - Heading: `fade-up` dengan staggered delays
  - Description: `fade-up` delay 300ms
  - Buttons: `fade-up` delay 400ms

- **Events Filter** (`show-events.blade.php`)
  - Filter box: `fade-up`
  - Event cards: `fade-up` dengan delay berdasarkan index

- **Media Partner** (`mediaPartner.blade.php`)
  - Header: `fade-up`
  - Description: `fade-up` delay 100ms
  - Logo container: `zoom-in` delay 200ms
  - Stats cards: `fade-up` delays 300ms, 400ms, 500ms

- **Articles** (`show-posts.blade.php`)
  - Header: `fade-up`
  - Description: `fade-up` delay 100ms
  - Article cards: `fade-up` dengan delay berdasarkan index

---

## ⚙️ Technical Details

### CSS Classes
```css
/* Initial State (Hidden) */
[data-scroll] {
    opacity: 0;
    transition: all 0.8s cubic-bezier(0.4, 0, 0.2, 1);
}

/* Visible State */
[data-scroll].is-visible {
    opacity: 1;
}
```

### JavaScript (Intersection Observer)
```javascript
const scrollObserver = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.classList.add('is-visible');
        }
    });
}, {
    threshold: 0.1,
    rootMargin: '0px 0px -15% 0px'
});

scrollElements.forEach(el => scrollObserver.observe(el));
```

### Trigger Point
- Animasi trigger ketika **10%** dari elemen terlihat
- `rootMargin` memberikan trigger **15% lebih awal** dari bottom viewport

---

## 🎯 Best Practices

### 1. **Jangan Overuse**
❌ **Bad**: Animasi di setiap elemen
```html
<div data-scroll="fade-up">
    <h1 data-scroll="fade-up">Title</h1>
    <p data-scroll="fade-up">Text</p>
    <span data-scroll="fade-up">Small text</span>
</div>
```

✅ **Good**: Animasi di container utama
```html
<div data-scroll="fade-up">
    <h1>Title</h1>
    <p>Text</p>
    <span>Small text</span>
</div>
```

---

### 2. **Gunakan Delays dengan Bijak**
✅ **Good**: Sequential delays
```html
<div data-scroll="fade-up">Item 1</div>
<div data-scroll="fade-up" data-scroll-delay="100">Item 2</div>
<div data-scroll="fade-up" data-scroll-delay="200">Item 3</div>
```

❌ **Bad**: Random delays
```html
<div data-scroll="fade-up" data-scroll-delay="500">Item 1</div>
<div data-scroll="fade-up" data-scroll-delay="100">Item 2</div>
<div data-scroll="fade-up" data-scroll-delay="800">Item 3</div>
```

---

### 3. **Pilih Animasi yang Sesuai**

| Content Type | Recommended Animation |
|--------------|----------------------|
| Text blocks | `fade-up` |
| Cards | `fade-up`, `zoom-in` |
| Images | `zoom-in`, `fade-left/right` |
| Headers | `fade-down`, `fade-up` |
| Stats | `fade-up` with delays |
| Icons | `zoom-in`, `rotate` |
| Sidebars | `fade-left/right` |

---

### 4. **Performance Tips**
- ✅ Gunakan Intersection Observer (sudah implemented)
- ✅ Limit animations per viewport
- ✅ Use CSS transforms (better performance)
- ❌ Avoid animating too many elements at once

---

## 🔧 Customization

### Menambah Animasi Baru

1. **Tambahkan CSS di `app.blade.php`**:
```css
/* Custom Bounce Animation */
[data-scroll="bounce"] {
    transform: translateY(100px) scale(0.5);
}

[data-scroll="bounce"].is-visible {
    transform: translateY(0) scale(1);
    animation: bounce 0.5s ease-out;
}

@keyframes bounce {
    0%, 20%, 50%, 80%, 100% {
        transform: translateY(0);
    }
    40% {
        transform: translateY(-30px);
    }
    60% {
        transform: translateY(-15px);
    }
}
```

2. **Gunakan di HTML**:
```html
<div data-scroll="bounce">
    Bouncing element!
</div>
```

---

### Mengubah Timing
Edit di `app.blade.php`:
```css
[data-scroll] {
    transition: all 1.2s ease-in-out; /* Default: 0.8s */
}
```

---

### Mengubah Trigger Point
Edit JavaScript di `app.blade.php`:
```javascript
const scrollObserver = new IntersectionObserver((entries) => {
    // Your code
}, {
    threshold: 0.2, // 20% harus terlihat (default: 0.1)
    rootMargin: '0px 0px -10% 0px' // Trigger 10% lebih awal
});
```

---

## 🐛 Troubleshooting

### Animasi Tidak Muncul?
1. ✅ Pastikan ada `data-scroll` attribute
2. ✅ Check console untuk errors
3. ✅ Clear cache browser
4. ✅ Pastikan JavaScript loaded

### Animasi Terlalu Cepat/Lambat?
```html
<!-- Perlambat -->
<div data-scroll="fade-up" data-scroll-duration="slow">
    Slow animation
</div>

<!-- Percepat -->
<div data-scroll="fade-up" data-scroll-duration="fast">
    Fast animation
</div>
```

### Delay Tidak Bekerja?
Pastikan format benar:
```html
<!-- ✅ Correct -->
<div data-scroll-delay="200">

<!-- ❌ Wrong -->
<div data-scroll-delay="200ms">
<div data-scroll-delay="0.2s">
```

---

## 📱 Browser Support

✅ **Supported**:
- Chrome 51+
- Firefox 55+
- Safari 12.1+
- Edge 15+

✅ **Fallback**: Older browsers akan langsung show elements tanpa animasi

---

## 🎉 Kesimpulan

Sistem scroll animation sudah **fully integrated** dan siap digunakan! Tinggal tambahkan `data-scroll` attributes ke elemen yang ingin dianimasi.

**Quick Start**:
```html
<div data-scroll="fade-up">
    Your content here
</div>
```

Selamat berkreasi dengan animasi scroll! 🚀✨
