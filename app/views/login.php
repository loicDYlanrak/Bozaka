<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TeaManager | Gestion de Thé</title>
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap">
</head>

<body>
    <!-- Animated Background Leaves -->
    <div class="leaves-container"></div>

    <div class="container">
        <div class="welcome-text">
            <h1>TeaManager</h1>
            <p>Bienvenue sur la plateforme de gestion de thé la plus avancée. Notre système vous permet de gérer
                efficacement votre production de thé, de la culture à la récolte.</p>

            <ul class="feature-list">
                <li>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path
                            d="M12 22c6.23-.05 7.87-5.57 7.5-10-.36-4.34-3.95-9.96-7.5-10-3.55.04-7.14 5.66-7.5 10-.37 4.43 1.27 9.95 7.5 10z">
                        </path>
                        <path d="M12 6c-1.79 1.82-2 4.88-2 8 0 3.12.21 6.18 2 8"></path>
                        <path d="M12 6c1.79 1.82 2 4.88 2 8 0 3.12-.21 6.18-2 8"></path>
                    </svg>
                    Gestion des variétés de thé
                </li>
                <li>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <rect x="3" y="3" width="18" height="18" rx="2"></rect>
                        <path d="M3 9h18"></path>
                        <path d="M9 21V9"></path>
                    </svg>
                    Suivi des parcelles
                </li>
                <li>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                        <circle cx="9" cy="7" r="4"></circle>
                        <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                        <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                    </svg>
                    Gestion des cueilleurs
                </li>
                <li>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M12 2v20M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path>
                    </svg>
                    Suivi financier
                </li>
            </ul>
        </div>

        <div class="auth-container">
            <!-- User Login Form -->
            <div class="form-container user-container">
                <h2>Connexion Utilisateur</h2>
                <form id="userLoginForm" action="/log" method="post">
                    <input type="hidden" name="userCat" value="user">
                    <div class="input-group">
                        <input type="email" name="email" required>
                        <label>Email</label>
                    </div>
                    <div class="input-group">
                        <input type="password" name="pwd" required>
                        <label>Mot de passe</label>
                    </div>
                    <button type="submit" class="btn">Se connecter</button>
                </form>
                <p class="switch-text">Pas de compte? <button class="switch-btn" id="switchToSignup">Inscrivez-vous
                        ici</button></p>
                <p class="switch-text">Administrateur? <button class="switch-btn" id="switchToAdmin">Connectez-vous
                        ici</button></p>
            </div>

            <!-- Admin Login Form -->
            <div class="form-container admin-container">
                <h2>Connexion Admin</h2>
                <form id="adminLoginForm" action="/log" method="post">
                    <input type="hidden" name="userCat" value="admin">
                    <div class="input-group">
                        <input type="text" name="email" required>
                        <label>Identifiant Admin</label>
                    </div>
                    <div class="input-group">
                        <input type="password" name="pwd" required>
                        <label>Mot de passe</label>
                    </div>
                    <button type="submit" class="btn">Se connecter</button>
                </form>
                <p class="switch-text">Utilisateur? <button class="switch-btn" id="switchToUser">Connectez-vous
                        ici</button></p>
            </div>

            <!-- User Signup Form -->
            <div class="form-container signup-container">
                <h2>Inscription Utilisateur</h2>
                <form id="userSignupForm" action="/signup" method="post">
                    <div class="input-group">
                        <input type="text" name="nom" required>
                        <label>Nom d'utilisateur</label>
                    </div>
                    <div class="input-group">
                        <input type="email" name="email" required>
                        <label>Email</label>
                    </div>
                    <div class="input-group">
                        <input type="password" name="pwd" required>
                        <label>Mot de passe</label>
                    </div>
                    <button type="submit" class="btn">S'inscrire</button>
                </form>
                <p class="switch-text">Déjà un compte? <button class="switch-btn" id="switchToLogin">Connectez-vous
                        ici</button></p>
            </div>
        </div>
    </div>

    <script src="assets/js/script.js"></script>
</body>

</html>