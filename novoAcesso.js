sombrancelhas = ["sadConcerned", "default", "angry"]
olhos = ["cry", "default", "squint"] // 0 - triste 1 - normal 2 - raiva
boca = ["screamOpen", "default", "grimace"]

const sentimento = document.querySelectorAll(".sentimentoInput")

let selectedSkinColor = 'ffdbac'
let selectedHairColor = 'a2826D'
let selectedOculos = ''
let selectedSentimento = 1              //ler esses dados do banco
let booleanOculos = 0
let selectedHairType = "curvy"

function updateAvatar() {
    const link = `https://api.dicebear.com/9.x/avataaars/svg?accessories=
${selectedOculos}
&hairColor=${selectedHairColor}
&skinColor=${selectedSkinColor}
&mouth=${boca[selectedSentimento]}
&eyes=${olhos[selectedSentimento]}
&accessoriesProbability=${booleanOculos}&accessoriesColor=262e33
&eyebrows=${sombrancelhas[selectedSentimento]}
&top=${selectedHairType}`;
    avatar.src = link;
}

sentimento.forEach(input => {
    input.addEventListener('click', (event) => {
        selectedSentimento = event.target.value;
        updateAvatar();
    })
})
window.onload = updateAvatar;
