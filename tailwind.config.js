import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";

/** @type {import('tailwindcss').Config} */
export default {
    darkMode: "class",
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
        "./node_modules/flowbite/**/*.js",
    ],

    theme: {
        extend: {
            colors: {
                secondary: {
                    1: "#555555",
                    2: "#666666",
                    3: "#f0f0f0",
                    4: "#0000001a",
                },
                "color-1": {
                    50: "#eff9ff",
                    100: "#def2ff",
                    200: "#b6e7ff",
                    300: "#75d7ff",
                    400: "#2cc3ff",
                    500: "#00a2e9",
                    600: "#0089d4",
                    700: "#006dab",
                    800: "#005c8d",
                    900: "#064d74",
                    950: "#04304d",
                },
            },
            fontFamily: {
                sans: ["Figtree", ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [forms, require("flowbite/plugin")],
};
