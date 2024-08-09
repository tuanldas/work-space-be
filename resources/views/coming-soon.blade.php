<!DOCTYPE html>
<html class="h-full" data-theme="true" data-theme-mode="light" lang="en">
<head>
    <title>
        Coming Soon
    </title>
    <meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport"/>
    @vite('resources/css/app.scss')
</head>
<body class="flex h-full dark:bg-coal-500">
<!--begin::Theme mode setup on page load-->
<script>
    const defaultThemeMode = 'light'; // light|dark|system
    let themeMode;
    if (document.documentElement) {
        if (localStorage.getItem('theme')) {
            themeMode = localStorage.getItem('theme');
        } else if (document.documentElement.hasAttribute('data-theme-mode')) {
            themeMode = document.documentElement.getAttribute('data-theme-mode');
        } else {
            themeMode = defaultThemeMode;
        }
        if (themeMode === 'system') {
            themeMode = window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light';
        }
        document.documentElement.classList.add(themeMode);
    }
</script>

<div class="flex items-center justify-center grow h-full">
    <div class="flex flex-col items-center">
        <div class="mb-16">
            <img alt="light" class="dark:hidden max-h-[250px]" src="{{asset('assets/media/illustrations/10.svg')}}"/>
            <img alt="dark" class="light:hidden max-h-[250px]" src="{{asset('assets/media/illustrations/10-dark.svg')}}"/>
        </div>
        <h3 class="text-2.5xl font-semibold text-gray-900 text-center mb-2">
            We're Launching Soon
        </h3>
     </div>
</div>
@vite('resources/js/app.js')
</body>
</html>
