document.addEventListener('DOMContentLoaded', () => {
    // Navigation
    const navLinks = document.querySelectorAll('.nav-links a[data-page]');
    const pages = document.querySelectorAll('.page');
    const pageTitle = document.querySelector('.page-title h1');

    // Données exemple
    const sampleData = {
        varieties: [
            { id: 1, name: 'Sencha', description: 'Thé vert japonais de haute qualité', price: 45.00 },
            { id: 2, name: 'Gyokuro', description: 'Thé vert premium cultivé à l\'ombre', price: 85.00 },
            { id: 3, name: 'Matcha', description: 'Poudre de thé vert cérémonial', price: 65.00 }
        ],
        parcels: [
            { id: 1, number: 'P001', surface: 2.5, variety: 'Sencha', status: 'active' },
            { id: 2, number: 'P002', surface: 1.8, variety: 'Gyokuro', status: 'maintenance' },
            { id: 3, number: 'P003', surface: 3.0, variety: 'Matcha', status: 'active' }
        ],
        pickers: [
            { id: 'C001', name: 'Jean Dupont', contact: '0123456789', performance: '95%' },
            { id: 'C002', name: 'Marie Martin', contact: '0234567890', performance: '88%' },
            { id: 'C003', name: 'Pierre Durant', contact: '0345678901', performance: '92%' }
        ],
        expenses: [
            { id: 1, name: 'Salaires', description: 'Paiement des cueilleurs', budget: 12000 },
            { id: 2, name: 'Maintenance', description: 'Entretien des parcelles', budget: 5000 },
            { id: 3, name: 'Équipement', description: 'Outils et matériel', budget: 3000 }
        ]
    };

    // Navigation entre les pages
    function showPage(pageId) {
        pages.forEach(page => page.classList.remove('active'));
        document.getElementById(`${pageId}-page`).classList.add('active');
        
        // Mise à jour du titre
        const titles = {
            dashboard: 'Tableau de Bord Administrateur',
            varieties: 'Gestion des Variétés de Thé',
            parcels: 'Gestion des Parcelles',
            pickers: 'Gestion des Cueilleurs',
            expenses: 'Catégories de Dépenses',
            salary: 'Configuration des Salaires'
        };
        pageTitle.textContent = titles[pageId];
    }

    navLinks.forEach(link => {
        link.addEventListener('click', (e) => {
            e.preventDefault();
            const pageId = link.dataset.page;
            
            // Mise à jour de la navigation
            document.querySelector('.nav-links li.active').classList.remove('active');
            link.parentElement.classList.add('active');
            
            showPage(pageId);
        });
    });

    // Gestion des modals
    window.showModal = function(modalId) {
        document.getElementById(modalId).classList.add('active');
    };

    window.hideModal = function(modalId) {
        document.getElementById(modalId).classList.remove('active');
    };

    // Fermeture des modals en cliquant en dehors
    document.querySelectorAll('.modal').forEach(modal => {
        modal.addEventListener('click', (e) => {
            if (e.target === modal) {
                modal.classList.remove('active');
            }
        });
    });

    // Remplissage des tableaux avec les données exemple
    function populateTable(tableId, data, columns) {
        const tbody = document.getElementById(tableId);
        tbody.innerHTML = '';

        data.forEach(item => {
            const tr = document.createElement('tr');
            columns.forEach(col => {
                const td = document.createElement('td');
                td.textContent = item[col];
                tr.appendChild(td);
            });

            // Ajout des boutons d'action
            const actionsTd = document.createElement('td');
            actionsTd.innerHTML = `
                <button class="btn-edit" onclick="editItem('${tableId}', ${item.id})">Modifier</button>
                <button class="btn-danger" onclick="deleteItem('${tableId}', ${item.id})">Supprimer</button>
            `;
            tr.appendChild(actionsTd);
            tbody.appendChild(tr);
        });
    }

    // Initialisation des tableaux
    populateTable('varieties-table', sampleData.varieties, ['name', 'description', 'price']);
    populateTable('parcels-table', sampleData.parcels, ['number', 'surface', 'variety', 'status']);
    populateTable('pickers-table', sampleData.pickers, ['id', 'name', 'contact', 'performance']);
    populateTable('expenses-table', sampleData.expenses, ['name', 'description', 'budget']);

    // Gestion des formulaires
    const forms = {
        'variety-form': {
            onSubmit: (data) => {
                console.log('Nouvelle variété:', data);
                hideModal('variety-modal');
            }
        },
        'parcel-form': {
            onSubmit: (data) => {
                console.log('Nouvelle parcelle:', data);
                hideModal('parcel-modal');
            }
        },
        'picker-form': {
            onSubmit: (data) => {
                console.log('Nouveau cueilleur:', data);
                hideModal('picker-modal');
            }
        },
        'expense-form': {
            onSubmit: (data) => {
                console.log('Nouvelle catégorie:', data);
                hideModal('expense-modal');
            }
        },
        'salary-config-form': {
            onSubmit: (data) => {
                console.log('Configuration salaires:', data);
                alert('Configuration enregistrée avec succès!');
            }
        }
    };

    // Initialisation des gestionnaires de formulaires
    Object.entries(forms).forEach(([formId, handlers]) => {
        document.getElementById(formId).addEventListener('submit', (e) => {
            e.preventDefault();
            const formData = new FormData(e.target);
            const data = Object.fromEntries(formData.entries());
            handlers.onSubmit(data);
        });
    });

    // Fonctions d'édition et de suppression
    window.editItem = function(tableId, itemId) {
        console.log(`Édition de l'élément ${itemId} dans ${tableId}`);
        // Implémenter la logique d'édition
    };

    window.deleteItem = function(tableId, itemId) {
        if (confirm('Êtes-vous sûr de vouloir supprimer cet élément ?')) {
            console.log(`Suppression de l'élément ${itemId} dans ${tableId}`);
            // Implémenter la logique de suppression
        }
    };

    // Déconnexion
    document.getElementById('logoutBtn').addEventListener('click', (e) => {
        e.preventDefault();
        if (confirm('Êtes-vous sûr de vouloir vous déconnecter ?')) {
            window.location.href = 'login.html';
        }
    });
});