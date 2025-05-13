// Function to initialize each slider
function initializeSlider(slider) {
    let items = slider.querySelectorAll('.list .item');
    let next = slider.querySelector('#next');
    let prev = slider.querySelector('#prev');
    let dots = slider.querySelectorAll('.dots li');

    let lengthItems = items.length - 1;
    let active = 0;

    next.onclick = function () {
        active = active + 1 <= lengthItems ? active + 1 : 0;
        reloadSlider();
    };

    prev.onclick = function () {
        active = active - 1 >= 0 ? active - 1 : lengthItems;
        reloadSlider();
    };

    let refreshInterval = setInterval(() => { next.click() }, 3000);

    function reloadSlider() {
        slider.querySelector('.list').style.left = -items[active].offsetLeft + 'px';

        let lastActiveDot = slider.querySelector('.dots li.active');
        lastActiveDot.classList.remove('active');
        dots[active].classList.add('active');

        clearInterval(refreshInterval);
        refreshInterval = setInterval(() => { next.click() }, 3000);
    }

    dots.forEach((li, key) => {
        li.addEventListener('click', () => {
            active = key;
            reloadSlider();
        });
    });

    window.onresize = function (event) {
        reloadSlider();
    };
}

// Initialize each slider on the page
document.querySelectorAll('.slider').forEach(initializeSlider);


//Counter

function updateCounters() {
    const counters = document.querySelectorAll('.counter');
    
    counters.forEach(counter => {
        const targetCount = parseInt(counter.getAttribute('data-count'));
        let currentCount = parseInt(counter.textContent);
        
        if (currentCount < targetCount) {
            currentCount++;
            counter.textContent = currentCount;
        }
    });

    requestAnimationFrame(updateCounters);
}

updateCounters();