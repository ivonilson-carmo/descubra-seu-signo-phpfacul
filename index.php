<?php include('layouts/header.php'); ?>
<body class="d-flex flex-column justify-content-center">

    <main class="container-sm card p-4" id="main-container">
        <form action="layouts/show_zodiac_sign.php" id="signo-form" method="POST" class="form d-flex flex-column justify-content-center">
            <h2 class="mb-5 text-center"> Descubra seu signo agora</h2>

            <div class="form-group my-2">
                <label for="dataNascimento" class="mb-1">
                    <small id="helpId" class="text-muted">Digite sua data de nascimento.</small>
                </label>
                <input maxlength="10" type="text" name="data_nascimento" id="dataNascimento" class="form-control" placeholder="Ex.: 05/11/2024" aria-describedby="helpId">
            </div>

            <button type="submit" class="btn btn-primary m-auto mt-4 px-5"> Descobrir </button>
        </form>
    </main>

    <script>

        document.querySelector('form').addEventListener('submit', () => {
            const data_nascimento = document.querySelector('input#dataNascimento').value.trim();
        })
    </script>


</body>
</html>