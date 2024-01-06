window.onload = function () {
    // ...

    const jobContainers = document.querySelectorAll('.job-container');

    window.addEventListener('scroll', function () {
        jobContainers.forEach(container => {
            const rect = container.getBoundingClientRect();
            const isVisible = (rect.top <= window.innerHeight / 2) && (rect.bottom >= window.innerHeight / 2);

            if (isVisible) {
                container.style.opacity = 1;
                container.style.transform = 'translateY(0)';
            } else {
                container.style.opacity = 0;
                container.style.transform = 'translateY(50px)'; // 調整控制消失的動畫效果
            }
        });
    });
};
