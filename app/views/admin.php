<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administration | Gestion de Thé</title>
    <link rel="stylesheet" href="assets/css/admin.css">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap">
</head>
<body>
    <nav class="sidebar">
        <div class="logo">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-leaf h-6 w-6" data-component-path="src\components\Navbar.tsx" data-component-name="Leaf" data-component-line="9" data-component-file="Navbar.tsx" data-component-content="%7B%22className%22%3A%22h-6%20w-6%22%7D"><path d="M11 20A7 7 0 0 1 9.8 6.1C15.5 5 17 4.48 19 2c1 2 2 4.18 2 8 0 5.5-4.78 10-10 10Z"></path><path d="M2 21c0-3 1.85-5.36 5.08-6C9.5 14.52 12 13 13 12"></path></svg>
            <h2>TeaManager Admin</h2>
        </div>
        <ul class="nav-links">
            <li class="active"><a href="#dashboard" data-page="dashboard">Tableau de bord</a></li>
            <li><a href="#varieties" data-page="varieties">Variétés de Thé</a></li>
            <li><a href="#parcels" data-page="parcels">Parcelles</a></li>
            <li><a href="#pickers" data-page="pickers">Cueilleurs</a></li>
            <li><a href="#expenses" data-page="expenses">Catégories de dépenses</a></li>
            <li><a href="#salary" data-page="salary">Configuration Salaires</a></li>
            <li><a href="#" id="logoutBtn">Déconnexion</a></li>
        </ul>
    </nav>

    <main class="main-content">
        <header>
            <div class="page-title">
                <h1>Tableau de Bord Administrateur</h1>
            </div>
            <div class="user-info">
                <span class="user-name">Admin</span>
                <i class="bi-person"></i>
            </div>
        </header>

        <!-- Pages de contenu -->
        <div class="content-pages">
            <!-- Page Tableau de bord -->
            <div class="page active" id="dashboard-page">
                <div class="stats-grid">
                    <div class="stat-card">
                        <h3>Total Cueilleurs</h3>
                        <p class="stat-value">45</p>
                    </div>
                    <div class="stat-card">
                        <h3>Parcelles Actives</h3>
                        <p class="stat-value">12</p>
                    </div>
                    <div class="stat-card">
                        <h3>Production Mensuelle</h3>
                        <p class="stat-value">2,500 kg</p>
                    </div>
                    <div class="stat-card">
                        <h3>Dépenses Mensuelles</h3>
                        <p class="stat-value">15,000 €</p>
                    </div>
                </div>
            </div>

            <!-- Page Variétés de Thé -->
            <div class="page" id="varieties-page">
                <div class="page-header">
                    <h2>Gestion des Variétés de Thé</h2>
                    <button class="btn-primary" onclick="showModal('variety-modal')">Ajouter une variété</button>
                </div>
                <div class="data-table">
                    <table>
                        <thead>
                            <tr>
                                <th>Nom</th>
                                <th>Description</th>
                                <th>Prix/kg</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody id="varieties-table">
                            <!-- Données chargées dynamiquement -->
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Page Parcelles -->
            <div class="page" id="parcels-page">
                <div class="page-header">
                    <h2>Gestion des Parcelles</h2>
                    <button class="btn-primary" onclick="showModal('parcel-modal')">Ajouter une parcelle</button>
                </div>
                <div class="data-table">
                    <table>
                        <thead>
                            <tr>
                                <th>Numéro</th>
                                <th>Surface (ha)</th>
                                <th>Variété</th>
                                <th>État</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody id="parcels-table">
                            <!-- Données chargées dynamiquement -->
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Page Cueilleurs -->
            <div class="page" id="pickers-page">
                <div class="page-header">
                    <h2>Gestion des Cueilleurs</h2>
                    <button class="btn-primary" onclick="showModal('picker-modal')">Ajouter un cueilleur</button>
                </div>
                <div class="data-table">
                    <table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nom</th>
                                <th>Contact</th>
                                <th>Performance</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody id="pickers-table">
                            <!-- Données chargées dynamiquement -->
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Page Catégories de dépenses -->
            <div class="page" id="expenses-page">
                <div class="page-header">
                    <h2>Catégories de Dépenses</h2>
                    <button class="btn-primary" onclick="showModal('expense-modal')">Ajouter une catégorie</button>
                </div>
                <div class="data-table">
                    <table>
                        <thead>
                            <tr>
                                <th>Catégorie</th>
                                <th>Description</th>
                                <th>Budget Mensuel</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody id="expenses-table">
                            <!-- Données chargées dynamiquement -->
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Page Configuration Salaires -->
            <div class="page" id="salary-page">
                <div class="page-header">
                    <h2>Configuration des Salaires</h2>
                </div>
                <div class="salary-config">
                    <form id="salary-config-form" class="config-form">
                        <div class="form-group">
                            <label>Salaire de base par kg</label>
                            <input type="number" step="0.01" name="baseRate" required>
                        </div>
                        <div class="form-group">
                            <label>Poids minimal quotidien (kg)</label>
                            <input type="number" step="0.1" name="minWeight" required>
                        </div>
                        <div class="form-group">
                            <label>Bonus performance (%)</label>
                            <input type="number" step="0.1" name="bonus" required>
                        </div>
                        <div class="form-group">
                            <label>Malus qualité (%)</label>
                            <input type="number" step="0.1" name="malus" required>
                        </div>
                        <button type="submit" class="btn-primary">Enregistrer</button>
                    </form>
                </div>
            </div>
        </div>
    </main>

    <!-- Modals -->
    <!-- Modal Variété -->
    <div class="modal" id="variety-modal">
        <div class="modal-content">
            <h3>Ajouter/Modifier une Variété</h3>
            <form id="variety-form">
                <div class="form-group">
                    <label>Nom de la variété</label>
                    <input type="text" name="name" required>
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <textarea name="description" required></textarea>
                </div>
                <div class="form-group">
                    <label>Prix par kg</label>
                    <input type="number" step="0.01" name="price" required>
                </div>
                <div class="form-actions">
                    <button type="button" class="btn-secondary" onclick="hideModal('variety-modal')">Annuler</button>
                    <button type="submit" class="btn-primary">Enregistrer</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal Parcelle -->
    <div class="modal" id="parcel-modal">
        <div class="modal-content">
            <h3>Ajouter/Modifier une Parcelle</h3>
            <form id="parcel-form">
                <div class="form-group">
                    <label>Numéro de parcelle</label>
                    <input type="text" name="number" required>
                </div>
                <div class="form-group">
                    <label>Surface (ha)</label>
                    <input type="number" step="0.01" name="surface" required>
                </div>
                <div class="form-group">
                    <label>Variété de thé</label>
                    <select name="variety" required>
                        <!-- Options chargées dynamiquement -->
                    </select>
                </div>
                <div class="form-group">
                    <label>État</label>
                    <select name="status" required>
                        <option value="active">Active</option>
                        <option value="maintenance">En maintenance</option>
                        <option value="inactive">Inactive</option>
                    </select>
                </div>
                <div class="form-actions">
                    <button type="button" class="btn-secondary" onclick="hideModal('parcel-modal')">Annuler</button>
                    <button type="submit" class="btn-primary">Enregistrer</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal Cueilleur -->
    <div class="modal" id="picker-modal">
        <div class="modal-content">
            <h3>Ajouter/Modifier un Cueilleur</h3>
            <form id="picker-form">
                <div class="form-group">
                    <label>Nom complet</label>
                    <input type="text" name="name" required>
                </div>
                <div class="form-group">
                    <label>Contact</label>
                    <input type="tel" name="contact" required>
                </div>
                <div class="form-group">
                    <label>Adresse</label>
                    <textarea name="address" required></textarea>
                </div>
                <div class="form-actions">
                    <button type="button" class="btn-secondary" onclick="hideModal('picker-modal')">Annuler</button>
                    <button type="submit" class="btn-primary">Enregistrer</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal Catégorie de dépense -->
    <div class="modal" id="expense-modal">
        <div class="modal-content">
            <h3>Ajouter/Modifier une Catégorie</h3>
            <form id="expense-form">
                <div class="form-group">
                    <label>Nom de la catégorie</label>
                    <input type="text" name="name" required>
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <textarea name="description" required></textarea>
                </div>
                <div class="form-group">
                    <label>Budget mensuel</label>
                    <input type="number" step="0.01" name="budget" required>
                </div>
                <div class="form-actions">
                    <button type="button" class="btn-secondary" onclick="hideModal('expense-modal')">Annuler</button>
                    <button type="submit" class="btn-primary">Enregistrer</button>
                </div>
            </form>
        </div>
    </div>

    <script src="assets/js/admin.js"></script>
</body>
</html>