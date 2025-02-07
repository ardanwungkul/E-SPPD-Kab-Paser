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
                    50: "#fef9ec",
                    100: "#fcedc9",
                    200: "#fada8d",
                    300: "#f6bb42",
                    400: "#f5a92a",
                    500: "#ee8712",
                    600: "#d3640c",
                    700: "#af450e",
                    800: "#8e3512",
                    900: "#752d12",
                    950: "#431505",
                },
            },
            fontFamily: {
                sans: ["Figtree", ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [forms, require("flowbite/plugin")],
};
