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
            <img alt="image" class="dark:hidden max-h-[160px]" src="assets/media/illustrations/20.svg"/>
            <img alt="image" class="light:hidden max-h-[160px]" src="assets/media/illustrations/20-dark.svg"/>
        </div>
        <span class="badge badge-primary badge-outline mb-3">
     500 Error
    </span>
        <h3 class="text-2.5xl font-semibold text-gray-900 text-center mb-2">
            Internal Server Error
        </h3>
        <div class="text-md font-medium text-center text-gray-600 mb-10">
            Server error occurred. Please try again later or
            <a class="text-primary font-medium hover:text-primary-active" href="#">
                Contact Us
            </a>
            for assistance.
        </div>
        <a class="btn btn-primary flex justify-center" href="html/demo1.html">
            Back to Home
        </a>
    </div>
</div>
@vite('resources/js/app.js')
</body>
</html>
