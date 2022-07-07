const defaultTheme = require("tailwindcss/defaultTheme");

module.exports = {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./vendor/laravel/jetstream/**/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ["NotoSansLao", ...defaultTheme.fontFamily.sans],
            },
            colors: {
                "moe-purple": "#303f9f",
                "moe-purple-light": "#48549e",
            },
            transitionProperty: {
                height: "height",
                spacing: "margin, padding, margin-left",
            },
        },
        fontFamily: {
            NotoSansLao: ["NotoSansLao, Poppins, sans-serif"],
        },
        container: {
            center: true,
            padding: "1rem",
            screens: {
                sm: "540px",
                md: "720px",
                lg: "960px",
                xl: "1140px",
                "2xl": "1320px",
            },
        },
    },

    daisyui: {
        styled: true,
        themes: true,
        base: false,
        utils: true,
        logs: true,
        rtl: false,
        prefix: "",
        themes: ["emerald"],
    },

    // plugins: [require('@tailwindcss/forms'), require("@tailwindcss/typography")],
    plugins: [require("@tailwindcss/typography"), require('@tailwindcss/line-clamp'), require("daisyui")],
};