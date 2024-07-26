document.addEventListener('DOMContentLoaded', () => {
    const submitBtn = document.getElementById('submitBtn');
    const avatar = document.getElementById('avatar');
    const skinButtons = document.querySelectorAll('.skinCorButton');
    const hairButtons = document.querySelectorAll('.hairCorButton');
    const usaOculos = document.querySelectorAll('.oculosInput');
    const sentimento = document.querySelectorAll('.sentimentoInput');
    const hairType = document.getElementById('hairType');
    const gender = document.getElementById('gender');
    const name = document.getElementById('name');
    const password = document.getElementById('password');
    const login = document.getElementById('login_medico');

    const sobrancelhas = ["sadConcerned", "default", "angry"];
    const olhos = ["cry", "default", "squint"];
    const boca = ["screamOpen", "default", "grimace"];

    let selectedSkinColor = 'ffdbac';
    let selectedHairColor = 'a2826D';
    let selectedOculos = '';
    let selectedSentimento = 1;
    let booleanOculos = 0;
    let selectedHairType = "curvy";

    function updateAvatar() {
        const link = `https://api.dicebear.com/9.x/avataaars/svg?accessories=${selectedOculos}&hairColor=${selectedHairColor}&skinColor=${selectedSkinColor}&mouth=${boca[selectedSentimento]}&eyes=${olhos[selectedSentimento]}&accessoriesProbability=${booleanOculos}&accessoriesColor=262e33&eyebrows=${sobrancelhas[selectedSentimento]}&top=${selectedHairType}`;
        avatar.src = link;
    }

    hairType.addEventListener('change', (event) => {
        selectedHairType = event.target.value;
        updateAvatar();
    });

    sentimento.forEach(input => {
        input.addEventListener('change', (event) => {
            selectedSentimento = event.target.value;
            updateAvatar();
        });
    });

    usaOculos.forEach(input => {
        input.addEventListener('change', (event) => {
            selectedOculos = event.target.value;
            booleanOculos = selectedOculos === '' ? 0 : 100;
            updateAvatar();
        });
    });

    skinButtons.forEach(button => {
        button.addEventListener('click', (event) => {
            selectedSkinColor = event.target.value;
            updateAvatar();
        });
    });

    hairButtons.forEach(button => {
        button.addEventListener('click', (event) => {
            selectedHairColor = event.target.value;
            updateAvatar();
        });
    });

    submitBtn.addEventListener('click', () => {
        const data = {
            name: name.value,
            password: password.value,
            login: login.value,
            gender: gender.value,
            oculos: selectedOculos,
            cor_cabelo: selectedHairColor,
            tipo_cabelo: selectedHairType,
            cor_pele: selectedSkinColor,
            sentimento: selectedSentimento
        };

        fetch('connect_cadastro_crianca.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(data)
        })
            .then(response => response.json())
            .then(result => {
                console.log(result);
                alert(result.message);
            })
            .catch(error => {
                console.error('Erro:', error);
                alert('Ocorreu um erro ao enviar os dados.');
            });
    });

    updateAvatar();
});
