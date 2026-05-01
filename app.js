const agendaEvents = {
    2: 'Conference Data Science - Salle des conferences.',
    7: 'Forum INSEA Entreprises - Rencontre etudiants et recruteurs.',
    22: "Soutenance doctorale a l'INSEA.",
};

document.querySelectorAll('[data-agenda-day]').forEach((button) => {
    button.addEventListener('click', () => {
        const day = button.dataset.agendaDay;
        const details = button.closest('.agenda')?.querySelector('[data-agenda-details]');

        document.querySelectorAll('[data-agenda-day]').forEach((item) => item.classList.remove('selected-day'));
        button.classList.add('selected-day');

        if (details) {
            details.innerHTML = agendaEvents[day]
                ? `<strong>${day} Avril 2026</strong><span>${agendaEvents[day]}</span>`
                : `<strong>${day} Avril 2026</strong><span>Aucun evenement programme.</span>`;
        }
    });
});

document.querySelectorAll('.tabs button').forEach((button) => {
    button.addEventListener('click', () => {
        const panel = button.closest('.sidebar, .contact-left');
        if (!panel) return;

        let box = panel.querySelector('.media-message');
        if (!box) {
            box = document.createElement('div');
            box.className = 'media-message';
            panel.insertBefore(box, panel.children[1] || null);
        }

        box.textContent = button.textContent.toLowerCase().includes('video')
            ? "Video institutionnelle de l'INSEA."
            : "Galerie d'images de l'INSEA.";
    });
});

document.querySelectorAll('.newsletter').forEach((form) => {
    form.addEventListener('submit', (event) => {
        event.preventDefault();
        let message = form.querySelector('.newsletter-message');

        if (!message) {
            message = document.createElement('p');
            message.className = 'newsletter-message';
            form.appendChild(message);
        }

        message.textContent = "Votre inscription a ete prise en compte.";
    });
});
