document.addEventListener("DOMContentLoaded", function () {
    const tabs  = document.querySelectorAll(".portal-tabs .tab");
    const forms = document.querySelectorAll(".portal-form");

    if (!tabs.length || !forms.length) return;

    tabs.forEach(tab => {
        tab.addEventListener("click", () => {
            const target = tab.dataset.tab;

            // إزالة Active
            tabs.forEach(t => t.classList.remove("active"));
            tab.classList.add("active");

            // إظهار/إخفاء الفورمات
            forms.forEach(f => {
                f.classList.toggle("hidden", f.dataset.panel !== target);
            });
        });
    });
});
