/** @type {import('tailwindcss').Config} */
export default {
    content: ["./resources/**/*.blade.php", "./public/**/*.js"],
    theme: {
        extend: {
            fontFamily: {
                // lobster: ["Lobster", "sans-serif"],
            },
            animation: {
                "loop-scroll": "loop-scroll 20s linear infinite",
            },
            keyframes: {
                "loop-scroll": {
                    from: { transform: "translateX(0)" },
                    to: { transform: "translateX(-50%)" },
                },
            },
        },
    },
    plugins: [require("daisyui")],
    daisyui: {
        themes: [
            {
                light: {
                    ...require("daisyui/src/theming/themes")["light"],
                    primary: "#285FD9",
                    "primary-content": "#ffffff",
                },
            },
        ],
    },
};
