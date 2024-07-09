import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
        "./resources/**/*.vue",
        "./node_modules/flowbite/**/*.js",
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ["Figtree", ...defaultTheme.fontFamily.sans],
            },
            colors: {
                // Vos couleurs personnalisées ici
                // #0E9471 Vert P
                // #138EC6 bleu P
                // #313C58 Gris P
                // #EEEDF2 Arrière plan P

                vertp: "#0E9471",
                bleup: "#138EC6",
                grisp: "#313C58",
                arpp: "#eeedf2",
                // ...
            },
        },
    },

    plugins: [forms],
};
