document.addEventListener("DOMContentLoaded", () => {

    const patients = [
        { name: "João Silva", age: 7, lastConsult: "2023-07-18", gender: "male" },
        { name: "Maria Oliveira", age: 12, lastConsult: "2023-07-15", gender: "female" },
        { name: "Pedro Santos", age: 11, lastConsult: "2023-07-10", gender: "male" }
        //ler dados do banco aqui
    ];

    const tableBody = document.querySelector("#patientsTable tbody");

    patients.forEach(patient => {
        const row = document.createElement("tr");

        const nameCell = document.createElement("td");
        nameCell.textContent = patient.name;
        row.appendChild(nameCell);

        const ageCell = document.createElement("td");
        ageCell.textContent = patient.age;
        row.appendChild(ageCell);

        const consultCell = document.createElement("td");
        consultCell.textContent = patient.lastConsult;
        row.appendChild(consultCell);

        const actionCell = document.createElement("td");
        const button = document.createElement("button");
        button.textContent = "Ver Detalhes";
        button.className = `button ${patient.gender}`;
        actionCell.appendChild(button);
        row.appendChild(actionCell);

        tableBody.appendChild(row);
    });
});
