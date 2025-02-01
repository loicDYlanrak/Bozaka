document.addEventListener('DOMContentLoaded', () => {
    // Create animated leaves background
    // Create animated leaves background
    const leavesContainer = document.querySelector('.leaves-container');
    const numberOfLeaves = 20;

    for (let i = 0; i < numberOfLeaves; i++) {
        // Créez un div pour contenir le SVG
        const leafDiv = document.createElement('div');
        leafDiv.className = 'leaf';
        leafDiv.style.position = 'absolute';
        leafDiv.style.left = `${Math.random() * 100}vw`;
        leafDiv.style.animationDelay = `${Math.random() * 20}s`;
        leafDiv.style.transform = `scale(${Math.random() * 0.5 + 0.5})`;

        // Créez l'élément SVG
        const leafSvg = document.createElementNS('http://www.w3.org/2000/svg', 'svg');
        leafSvg.setAttribute('xmlns', 'http://www.w3.org/2000/svg');
        leafSvg.setAttribute('width', '24');
        leafSvg.setAttribute('height', '24');
        leafSvg.setAttribute('viewBox', '0 0 24 24');
        leafSvg.setAttribute('fill', 'none');
        leafSvg.setAttribute('stroke', 'currentColor');
        leafSvg.setAttribute('stroke-width', '2');
        leafSvg.setAttribute('stroke-linecap', 'round');
        leafSvg.setAttribute('stroke-linejoin', 'round');
        leafSvg.setAttribute('class', 'lucide lucide-leaf h-6 w-6');

        // Ajoutez les paths du SVG
        const path1 = document.createElementNS('http://www.w3.org/2000/svg', 'path');
        path1.setAttribute('d', 'M11 20A7 7 0 0 1 9.8 6.1C15.5 5 17 4.48 19 2c1 2 2 4.18 2 8 0 5.5-4.78 10-10 10Z');

        const path2 = document.createElementNS('http://www.w3.org/2000/svg', 'path');
        path2.setAttribute('d', 'M2 21c0-3 1.85-5.36 5.08-6C9.5 14.52 12 13 13 12');

        leafSvg.appendChild(path1);
        leafSvg.appendChild(path2);

        // Ajoutez le SVG au div
        leafDiv.appendChild(leafSvg);

        // Ajoutez le div au conteneur principal
        leavesContainer.appendChild(leafDiv);
    }
    const authContainer = document.querySelector('.auth-container');
    const switchToAdminBtn = document.getElementById('switchToAdmin');
    const switchToUserBtn = document.getElementById('switchToUser');
    const switchToSignupBtn = document.getElementById('switchToSignup');
    const switchToLoginBtn = document.getElementById('switchToLogin');

    // Switch between user and admin forms with animation
    switchToAdminBtn.addEventListener('click', () => {
        authContainer.classList.add('show-admin');
        authContainer.classList.remove('show-signup');
    });

    switchToUserBtn.addEventListener('click', () => {
        authContainer.classList.remove('show-admin');
        authContainer.classList.remove('show-signup');
    });

    switchToSignupBtn.addEventListener('click', () => {
        authContainer.classList.add('show-signup');
        authContainer.classList.remove('show-admin');
    });

    switchToLoginBtn.addEventListener('click', () => {
        authContainer.classList.remove('show-signup');
    });

    const userLoginForm = document.getElementById('userLoginForm');
    const adminLoginForm = document.getElementById('adminLoginForm');

    // // Handle user login with animation
    // userLoginForm.addEventListener('submit', (e) => {
    //     e.preventDefault();
    //     const btn = e.target.querySelector('.btn');
    //     btn.style.transform = 'scale(0.95)';

    //     setTimeout(() => {
    //         btn.style.transform = 'scale(1)';
    //         const email = userLoginForm.querySelector('input[type="email"]').value;
    //         const password = userLoginForm.querySelector('input[type="password"]').value;

    //         // Here you would typically make an API call to verify credentials
    //         console.log('User login:', { email, password });
    //         // Redirect to user dashboard on success
    //         window.location.href = 'accueil.html';
    //     }, 200);
    // });

    // // Handle admin login with animation
    // adminLoginForm.addEventListener('submit', (e) => {
    //     e.preventDefault();
    //     const btn = e.target.querySelector('.btn');
    //     btn.style.transform = 'scale(0.95)';

    //     setTimeout(() => {
    //         btn.style.transform = 'scale(1)';
    //         const username = adminLoginForm.querySelector('input[type="text"]').value;
    //         const password = adminLoginForm.querySelector('input[type="password"]').value;

    //         // Here you would typically make an API call to verify admin credentials
    //         console.log('Admin login:', { username, password });
    //         // Redirect to admin dashboard on success
    //         window.location.href = 'admin.html';
    //     }, 200);
    // });

    // Add input animation
    const inputs = document.querySelectorAll('input');
    inputs.forEach(input => {
        input.addEventListener('focus', () => {
            input.parentElement.classList.add('focused');
        });

        input.addEventListener('blur', () => {
            if (!input.value) {
                input.parentElement.classList.remove('focused');
            }
        });
    });

    // Add ripple effect to buttons
    const buttons = document.querySelectorAll('.btn');
    buttons.forEach(button => {
        button.addEventListener('click', function (e) {
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
});