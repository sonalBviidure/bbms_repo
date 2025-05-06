document.addEventListener('DOMContentLoaded', function() {
    // Get all sliders on the page
    const sliders = document.querySelectorAll('.slider');
    
    // Initialize each slider separately
    sliders.forEach((slider) => {
        const list = slider.querySelector('.list');
        const items = slider.querySelectorAll('.item');
        const prevBtn = slider.querySelector('.prev-btn');
        const nextBtn = slider.querySelector('.next-btn');
        const dots = slider.querySelectorAll('.dots li');
        
        let currentIndex = 0;
        
        // Add transition style to list element
        list.style.transition = 'transform 0.2s ease-in-out';
        list.style.display = 'flex';
        list.style.width = `${items.length * 100}%`;
        
        // Set each item width
        items.forEach(item => {
            item.style.width = `${100 / items.length}%`;
            item.style.flex = '0 0 auto';
        });
        
        function updateSlider() {
            list.style.transform = `translateX(-${currentIndex * (100 / items.length)}%)`;
            
            dots.forEach((dot, index) => {
                dot.classList.toggle('active', index === currentIndex);
            });
        }
        
        // Previous button click
        prevBtn?.addEventListener('click', () => {
            currentIndex = (currentIndex - 1 + items.length) % items.length;
            updateSlider();
        });
        
        // Next button click
        nextBtn?.addEventListener('click', () => {
            currentIndex = (currentIndex + 1) % items.length;
            updateSlider();
        });
        
        // Dot click
        dots.forEach((dot, index) => {
            dot.addEventListener('click', () => {
                currentIndex = index;
                updateSlider();
            });
        });
        
        // Auto slide
        setInterval(() => {
            currentIndex = (currentIndex + 1) % items.length;
            updateSlider();
        }, 2000);
        
        // Initial setup
        updateSlider();
    });
});