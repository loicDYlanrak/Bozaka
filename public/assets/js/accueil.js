document.addEventListener('DOMContentLoaded', () => {
    // Sample tea variety data
    const teaVarieties = [
        {
            name: 'Sencha',
            image: 'https://images.unsplash.com/photo-1564890369478-c89ca6d9cde9?ixlib=rb-1.2.1&auto=format&fit=crop&w=300&q=80',
            production: '850 kg',
            quality: '95%'
        },
        {
            name: 'Gyokuro',
            image: 'https://images.unsplash.com/photo-1563822249366-3e5c6b73a1ae?ixlib=rb-1.2.1&auto=format&fit=crop&w=300&q=80',
            production: '420 kg',
            quality: '98%'
        },
        {
            name: 'Matcha',
            image: 'https://images.unsplash.com/photo-1582793988951-9aed5509eb97?ixlib=rb-1.2.1&auto=format&fit=crop&w=300&q=80',
            production: '320 kg',
            quality: '92%'
        }
    ];

    const varietiesGrid = document.querySelector('.varieties-grid');

    // Populate tea varieties
    teaVarieties.forEach(tea => {
        const card = document.createElement('div');
        card.className = 'stat-card';
        card.innerHTML = `
            <img src="${tea.image}" alt="${tea.name}" style="width: 100%; height: 150px; object-fit: cover; border-radius: 8px; margin-bottom: 10px;">
            <h3>${tea.name}</h3>
            <p>Production: ${tea.production}</p>
            <p>Qualité: ${tea.quality}</p>
        `;
        varietiesGrid.appendChild(card);
    });

    // Search functionality
    const searchInput = document.querySelector('.search-bar input');
    searchInput.addEventListener('input', (e) => {
        const searchTerm = e.target.value.toLowerCase();
        const cards = document.querySelectorAll('.varieties-grid .stat-card');
        
        cards.forEach(card => {
            const teaName = card.querySelector('h3').textContent.toLowerCase();
            if (teaName.includes(searchTerm)) {
                card.style.display = 'block';
            } else {
                card.style.display = 'none';
            }
        });
    });

    // Add click event listeners to navigation links
    document.querySelectorAll('.nav-links a').forEach(link => {
        link.addEventListener('click', (e) => {
            e.preventDefault();
            document.querySelector('.nav-links li.active').classList.remove('active');
            link.parentElement.classList.add('active');
            window.location.href = link.href;
        });
    });

    // Déconnexion
    document.getElementById('logoutBtn').addEventListener('click', (e) => {
        e.preventDefault();
        if (confirm('Êtes-vous sûr de vouloir vous déconnecter ?')) {
            window.location.href = 'login.html';
        }
    });
});