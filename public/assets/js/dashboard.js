document.addEventListener('DOMContentLoaded', () => {
    // Create animated background icons
    const bgPattern = document.querySelector('.bg-pattern');
    const numberOfIcons = 20;

    for (let i = 0; i < numberOfIcons; i++) {
        const icon = document.createElement('div');
        icon.className = 'bg-icon';
        icon.style.left = `${Math.random() * 100}vw`;
        icon.style.animationDelay = `${Math.random() * 20}s`;
        icon.style.transform = `scale(${Math.random() * 0.5 + 0.5})`;
        bgPattern.appendChild(icon);
    }

    // Search functionality
    const searchInput = document.querySelector('.search-bar input');
    searchInput.addEventListener('input', (e) => {
        const searchTerm = e.target.value.toLowerCase();
        // Implement search functionality here
    });

    // Add hover effect to table rows
    const tableRows = document.querySelectorAll('tbody tr');
    tableRows.forEach(row => {
        row.addEventListener('mouseenter', () => {
            row.style.transform = 'scale(1.01)';
            row.style.transition = 'transform 0.2s ease';
        });

        row.addEventListener('mouseleave', () => {
            row.style.transform = 'scale(1)';
        });
    });

    // Add click animation to buttons
    const buttons = document.querySelectorAll('.btn');
    buttons.forEach(button => {
        button.addEventListener('click', function(e) {
            const x = e.clientX - e.target.offsetLeft;
            const y = e.clientY - e.target.offsetTop;
            
            const ripple = document.createElement('span');
            ripple.style.left = `${x}px`;
            ripple.style.top = `${y}px`;
            
            this.appendChild(ripple);
            
            setTimeout(() => {
                ripple.remove();
            }, 600);
        });
    });

    // Responsive sidebar
    const sidebar = document.querySelector('.sidebar');
    const mainContent = document.querySelector('.main-content');
    
    function handleResize() {
        if (window.innerWidth <= 1024) {
            sidebar.classList.add('collapsed');
            mainContent.style.marginLeft = '80px';
        } else {
            sidebar.classList.remove('collapsed');
            mainContent.style.marginLeft = '280px';
        }
    }

    window.addEventListener('resize', handleResize);
    handleResize();

    // Initialize charts (if needed)
    // Add your chart initialization code here

    // Add smooth page transitions
    document.querySelectorAll('.nav-links a').forEach(link => {
        link.addEventListener('click', (e) => {
            const currentPage = document.querySelector('.nav-links li.active');
            if (currentPage) {
                currentPage.classList.remove('active');
            }
            link.parentElement.classList.add('active');
        });
    });
});