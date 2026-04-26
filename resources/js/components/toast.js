const GRCToast = (() => {
    const container = document.getElementById("toast-container");

    const icons = {
        success: `<svg fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>`,
        error: `<svg fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>`,
        warning: `<svg fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v4m0 4h.01M10.29 3.86L1.82 18a2 2 0 001.71 3h16.94a2 2 0 001.71-3L13.71 3.86a2 2 0 00-3.42 0z"/></svg>`,
        info: `<svg fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13 16h-1v-4h-1m1-4h.01M12 2a10 10 0 100 20A10 10 0 0012 2z"/></svg>`,
    };

    const defaultTitles = {
        success: "Berhasil!",
        error: "Terjadi Kesalahan",
        warning: "Perhatian",
        info: "Informasi",
    };

    function show({
        type = "info",
        title = null,
        message = "",
        duration = 4000,
    }) {
        const toast = document.createElement("div");
        toast.className = `toast-item toast-${type}`;
        toast.setAttribute("role", "alert");

        toast.innerHTML = `
            <div class="toast-icon-wrap">${icons[type] ?? icons.info}</div>
            <div class="toast-body">
                <div class="toast-title">${title ?? defaultTitles[type]}</div>
                ${message ? `<div class="toast-message">${message}</div>` : ""}
            </div>
            <button class="toast-close" aria-label="Tutup">
                <svg fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
            <div class="toast-progress" style="animation-duration:${duration}ms;"></div>
        `;

        container.appendChild(toast);

        const dismiss = () => {
            if (toast.classList.contains("toast-leaving")) return;
            toast.classList.add("toast-leaving");
            toast.addEventListener("animationend", () => toast.remove(), {
                once: true,
            });
        };

        let autoTimer = setTimeout(dismiss, duration);

        toast.querySelector(".toast-close").addEventListener("click", (e) => {
            e.stopPropagation();
            dismiss();
        });

        toast.addEventListener("click", dismiss);

        toast.addEventListener("mouseenter", () => {
            clearTimeout(autoTimer);
            toast.querySelector(".toast-progress").style.animationPlayState =
                "paused";
        });

        toast.addEventListener("mouseleave", () => {
            toast.querySelector(".toast-progress").style.animationPlayState =
                "running";
            autoTimer = setTimeout(dismiss, 1500);
        });
    }

    return { show };
})();

window.GRCToast = GRCToast;
