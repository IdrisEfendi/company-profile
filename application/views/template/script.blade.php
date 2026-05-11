<script>
    const root = document.documentElement;
    const themeToggle = document.getElementById('themeToggle');
    const themeIconMoon = document.getElementById('themeIconMoon');
    const themeIconSun = document.getElementById('themeIconSun');

    function syncThemeIcon() {
        const isDark = root.classList.contains('dark');
        themeIconMoon.classList.toggle('hidden', isDark);
        themeIconSun.classList.toggle('hidden', !isDark);
    }

    if (themeToggle) {
        syncThemeIcon();
        themeToggle.addEventListener('click', function() {
            const isDark = root.classList.toggle('dark');
            document.cookie = `theme=${isDark ? 'dark' : 'light'}; path=/; max-age=31536000; samesite=lax`;
            syncThemeIcon();
        });
    }
</script>
