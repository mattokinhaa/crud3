<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <section class="login-centro">
        <div class="login">
            <div class="input__container">
                <div class="shadow__input"></div>
                <?php if (isset($_GET['erro']) && $_GET['erro'] == 'login'): ?>
                    <p style="color: red;">Usuário ou senha incorretos</p>
                <?php endif; ?>
                <?php if (isset($_GET['sucesso']) && $_GET['sucesso'] == 'cadastro'): ?>
                    <p style="color: green;">Seu cadastro foi concluído com sucesso, faça o login em nossa plataforma abaixo</p>
                <?php endif; ?>
                <form action="login.php" method="post">
                    <div class="username">
                        <button class="input__button__shadow">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="#000000" width="20px" height="20px">
                                <path d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"></path>
                            </svg>
                        </button>
                        <input type="text" name="nome" class="input__search" placeholder="Insira seu nome" required />
                    </div>
                    <div class="password">
                        <button class="input__button__shadow">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-lock-fill" viewBox="0 0 16 16">
                                <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2m3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2"></path>
                            </svg>
                        </button>
                        <input type="password" name="senha" class="input__search" placeholder="Insira sua senha" required />
                    </div>
                    <div class="user-btn">
                        <button type="submit" name="acao" value="login">Login</button>
                    </div>
                </form>
                <p>Não tem uma conta? <a href="registro.php">Cadastre-se aqui!</a></p>
            </div>
        </div>
    </section>
</body>
</html>