// câu hỏi thường gặp
const questions = document.querySelectorAll('.faq-question');
questions.forEach(btn => {
    btn.addEventListener('click', () => {
        const answer = btn.nextElementSibling;
        answer.style.display = answer.style.display === 'block' ? 'none' : 'block';
    });
});

document.querySelectorAll(".form-title").forEach(btn => {
    btn.addEventListener("click", () => {
        const parent = btn.parentElement;
        parent.classList.toggle("active");
    });
});

