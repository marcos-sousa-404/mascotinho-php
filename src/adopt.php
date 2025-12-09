<?php
// 1. Simulação de Banco de Dados de Animais
$animais = [
    1 => [
        'nome' => 'Thor',
        'tipo' => 'dog', // dog ou cat
        'sexo' => 'male',
        'idade' => '2 anos',
        'descricao' => 'Muito brincalhão e adora correr.',
        'img' => 'src/assets/images/landing-hero/landing-hero-sm.png'
    ],
    2 => [
        'nome' => 'Luna',
        'tipo' => 'cat',
        'sexo' => 'female',
        'idade' => '1 ano',
        'descricao' => 'Calma, carinhosa e adora dormir.',
        'img' => 'src/assets/images/contact-us-hero/contact-us-hero-sm.png'
    ],
    3 => [
        'nome' => 'Bob',
        'tipo' => 'dog',
        'sexo' => 'male',
        'idade' => '5 meses',
        'descricao' => 'Filhote cheio de energia.',
        'img' => 'src/assets/images/adopt-hero/adopt-hero-sm.jpg'
    ],
    // Adicione mais animais aqui se quiser
];

// 2. Verifica se algum animal foi selecionado pelo ID na URL (ex: /adopt?id=1)
$animalId = isset($_GET['id']) ? (int)$_GET['id'] : null;
$animalSelecionado = null;

if ($animalId && isset($animais[$animalId])) {
    $animalSelecionado = $animais[$animalId];
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adote um Amigo - Abrigo Mascotinho</title>

    <link rel="stylesheet" href="src/adopt.css">
    <link rel="stylesheet" href="src/styles.css">
    <link rel="stylesheet" href="src/mobile-menu.css">
    <style>
        /* CSS Específico para os cards dos animais (inline para facilitar) */
        .animal-img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 0.6rem;
            margin-bottom: 1rem;
        }
        .animal-tag {
            background-color: #eee;
            padding: 0.2rem 0.6rem;
            border-radius: 0.4rem;
            font-size: 1.2rem;
            font-weight: 600;
            color: #555;
            margin-right: 0.5rem;
        }
        .animal-info {
            display: flex;
            gap: 0.5rem;
            margin-bottom: 1rem;
        }
        .btn-adopt-card {
            margin-top: auto;
            width: 100%;
            text-align: center;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
<div class="header">
    <div class="header-logo-group">
        <a href="/">
            <svg viewBox="0 0 640 640" width="24" height="24" fill="currentColor" class="go-back-icon">
                <path fill="currentColor" d="M73.4 297.4C60.9 309.9 60.9 330.2 73.4 342.7L233.4 502.7C245.9 515.2 266.2 515.2 278.7 502.7C291.2 490.2 291.2 469.9 278.7 457.4L173.3 352L544 352C561.7 352 576 337.7 576 320C576 302.3 561.7 288 544 288L173.3 288L278.7 182.6C291.2 170.1 291.2 149.8 278.7 137.3C266.2 124.8 245.9 124.8 233.4 137.3L73.4 297.3z"/>
            </svg>
        </a>
        <img src="src/assets/images/logo.png" class="site-logo"/>
    </div>
    <nav class="navbar-links">
        <a href="/" class="navbar-link">Início</a>
        <a href="adopt" class="navbar-link navbar-link-active">Adote um amigo</a>
        <a href="donate" class="navbar-link">Faça uma doação</a>
        <a href="contact-us" class="navbar-link">Nos siga</a>
    </nav>
    <button class="mobile-menu-button" id="mobileMenuButton">
        <svg viewBox="0 0 640 640" width="24" height="24" fill="currentColor" class="hamburger-menu-icon">
             <path fill="currentColor" d="M96 160C96 142.3 110.3 128 128 128L512 128C529.7 128 544 142.3 544 160C544 177.7 529.7 192 512 192L128 192C110.3 192 96 177.7 96 160zM96 320C96 302.3 110.3 288 128 288L512 288C529.7 288 544 302.3 544 320C544 337.7 529.7 352 512 352L128 352C110.3 352 96 337.7 96 320zM544 480C544 497.7 529.7 512 512 512L128 512C110.3 512 96 497.7 96 480C96 462.3 110.3 448 128 448L512 448C529.7 448 544 462.3 544 480z"/>
        </svg>
    </button>
     <div class="mobile-drawer" id="mobileDrawer">
        <button class="mobile-drawer-close" id="mobileDrawerClose" aria-label="Fechar menu">
            <svg viewBox="0 0 24 24" class="mobile-drawer-close-icon">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m5 5 14 14M5 19 19 5"></path>
            </svg>
        </button>
        <a href="/" class="mobile-drawer-link">Início</a>
        <a href="adopt" class="mobile-drawer-link navbar-link-active">Adote um amigo</a>
        <a href="donate" class="mobile-drawer-link">Faça uma doação</a>
        <a href="contact-us" class="mobile-drawer-link">Nos siga</a>
    </div>
    <div class="mobile-drawer-backdrop" id="mobileDrawerBackdrop"></div>
</div>

<main class="main-content-padding">
    <section class="hero-banner page-section-full-width">
        <div class="hero-content-area">
            <h2 align="left" class="section-title-underlined page-title">
                <?php echo $animalSelecionado ? 'Finalizar Adoção' : 'Nossos Amigos'; ?>
            </h2>
            <p class="hero-description">
                <?php echo $animalSelecionado 
                    ? 'Você está a um passo de mudar a vida do ' . $animalSelecionado['nome'] . '. Preencha os dados abaixo.' 
                    : 'Conheça os animais que estão esperando por um lar cheio de amor.'; ?>
            </p>
        </div>
    </section>

    <section class="main-content-centered">
        
        <?php if (!$animalSelecionado): ?>
            <div class="cards-grid">
                <?php foreach ($animais as $id => $animal): ?>
                    <div class="standard-card icon-card contact-card-max-width" style="align-items: flex-start; text-align: left;">
                        <img src="<?php echo $animal['img']; ?>" alt="<?php echo $animal['nome']; ?>" class="animal-img">
                        <h3 class="card-title"><?php echo $animal['nome']; ?></h3>
                        
                        <div class="animal-info">
                            <span class="animal-tag"><?php echo $animal['tipo'] == 'dog' ? 'Cão' : 'Gato'; ?></span>
                            <span class="animal-tag"><?php echo $animal['sexo'] == 'male' ? 'Macho' : 'Fêmea'; ?></span>
                            <span class="animal-tag"><?php echo $animal['idade']; ?></span>
                        </div>
                        
                        <p class="card-description" style="margin-bottom: 2rem;">
                            <?php echo $animal['descricao']; ?>
                        </p>
                        
                        <a href="adopt?id=<?php echo $id; ?>" class="primary-button btn-adopt-card">
                            Quero Adotar
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>

        <?php else: ?>
            <div class="form-card content-card-large">
                <div style="width: 100%; margin-bottom: 2rem;">
                    <a href="adopt" style="text-decoration: none; color: #FF5A00; font-weight: 600;">&larr; Voltar para a lista</a>
                </div>

                <h2 align="left" class="section-title-underlined">Informações pessoais</h2>
                <form class="adoption-form">
                    <div class="form-fields-wrapper">
                        <div class="form-field-group">
                            <label for="animalSelect" class="form-label">
                                <span class="label-text-bold">Animal Escolhido:*</span>
                            </label>
                            <select required id="animalSelect" name="animalId" class="form-input">
                                <?php foreach ($animais as $id => $animal): ?>
                                    <option value="<?php echo $id; ?>" <?php echo ($id == $animalId) ? 'selected' : ''; ?>>
                                        <?php echo $animal['nome']; ?> (<?php echo $animal['tipo'] == 'dog' ? 'Cão' : 'Gato'; ?>)
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="form-field-group">
                            <label for="name" class="form-label"><span class="label-text-bold">Seu Nome:*</span></label>
                            <input type="text" required id="name" name="name" placeholder="Coloque seu nome" class="form-input"/>
                        </div>
                        
                        <div class="form-field-group">
                            <label for="phone" class="form-label"><span class="label-text-bold">Telefone:*</span></label>
                            <input type="tel" required id="phone" name="phone" placeholder="(99) 99999-9999" class="form-input"/>
                        </div>

                        <div class="form-field-group">
                            <label for="animalType" class="form-label"><span class="label-text-bold">Tipo:*</span></label>
                            <select required id="animalType" name="animalType" class="form-input">
                                <option value="dog" <?php echo $animalSelecionado['tipo'] == 'dog' ? 'selected' : ''; ?>>Cachorro</option>
                                <option value="cat" <?php echo $animalSelecionado['tipo'] == 'cat' ? 'selected' : ''; ?>>Gato</option>
                            </select>
                        </div>
                        
                        <div class="form-field-group">
                            <label for="petGender" class="form-label"><span class="label-text-bold">Sexo do pet:*</span></label>
                            <select id="petGender" name="petGender" class="form-input">
                                <option value="male" <?php echo $animalSelecionado['sexo'] == 'male' ? 'selected' : ''; ?>>Macho</option>
                                <option value="female" <?php echo $animalSelecionado['sexo'] == 'female' ? 'selected' : ''; ?>>Fêmea</option>
                            </select>
                        </div>
                        
                        <div class="form-field-group">
                            <label for="motivation" class="form-label"><span class="label-text-bold">Motivação:</span></label>
                            <textarea id="motivation" name="motivation" placeholder="Por que você escolheu o <?php echo $animalSelecionado['nome']; ?>?" rows="2" class="form-input"></textarea>
                        </div>
                    </div>
                    <button class="primary-button form-submit-button">Enviar Adoção</button>
                </form>
            </div>
        <?php endif; ?>

    </section>
</main>
<div class="footer">
    <h5 class="footer-text-small">© Abrigo Mascotinho 2025. Todos os direitos reservados</h5>
    <p class="footer-description">Projeto de extensão elaborado por alunos da Universidade 7 de Setembro.</p>
</div>
<script src="src/mobile-menu.js"></script>
</body>
</html>