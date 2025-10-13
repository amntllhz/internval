import { Tooltip } from 'flowbite';

window.addEventListener('load', () => {
    const copyButton = document.querySelector('[data-copy-to-clipboard-target="npm-install-copy-button"]');
    const input = document.getElementById('npm-install-copy-button');
    const tooltipEl = document.getElementById('tooltip-copy-npm-install-copy-button');

    const defaultIcon = document.getElementById('default-icon');
    const successIcon = document.getElementById('success-icon');
    const defaultTooltipMessage = document.getElementById('default-tooltip-message');
    const successTooltipMessage = document.getElementById('success-tooltip-message');

    // Pastikan elemen-elemen utama ada sebelum lanjut
    if (!copyButton || !input || !tooltipEl) return;

    // Inisialisasi Tooltip secara manual (Flowbite v3)
    const tooltip = new Tooltip(tooltipEl, copyButton, {
        placement: 'top',
        triggerType: 'manual',
    });

    // Event copy
    copyButton.addEventListener('click', async () => {
        try {
            // Salin teks dari input
            await navigator.clipboard.writeText(input.value);

            // Ubah ke mode sukses
            defaultIcon.classList.add('hidden');
            successIcon.classList.remove('hidden');
            defaultTooltipMessage.classList.add('hidden');
            successTooltipMessage.classList.remove('hidden');
            tooltip.show();

            // Kembalikan ke keadaan default setelah 2 detik
            setTimeout(() => {
                defaultIcon.classList.remove('hidden');
                successIcon.classList.add('hidden');
                defaultTooltipMessage.classList.remove('hidden');
                successTooltipMessage.classList.add('hidden');
                tooltip.hide();
            }, 2000);
        } catch (err) {
            console.error('Gagal menyalin ID:', err);
        }
    });
});
