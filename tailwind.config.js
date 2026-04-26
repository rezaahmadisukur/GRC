import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
    ],

    theme: {
        extend: {
            backgroundImage: {
                "soft-glow":
                    "radial-gradient(circle 600px at 0% 200px, #bfdbfe, transparent), " +
                    "radial-gradient(circle 600px at 100% 200px, #bfdbfe, transparent)",
                "select-arrow":
                    "url(\"data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3e%3cpath stroke='%236b7280' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='M6 8l4 4 4-4'/%3e%3c/svg%3e\")",
            },
            fontFamily: {
                sans: ["Figtree", ...defaultTheme.fontFamily.sans],
            },
            colors: {
                border: "hsl(var(--border) / <alpha-value>)",
                input: "hsl(var(--input) / <alpha-value>)",
                ring: "hsl(var(--ring) / <alpha-value>)",
                background: "hsl(var(--background) / <alpha-value>)",
                foreground: "hsl(var(--foreground) / <alpha-value>)",
                primary: {
                    DEFAULT: "hsl(var(--primary) / <alpha-value>)",
                    foreground:
                        "hsl(var(--primary-foreground) / <alpha-value>)",
                },
                secondary: {
                    DEFAULT: "hsl(var(--secondary) / <alpha-value>)",
                    foreground:
                        "hsl(var(--secondary-foreground) / <alpha-value>)",
                },
                muted: {
                    DEFAULT: "hsl(var(--muted) / <alpha-value>)",
                    foreground: "hsl(var(--muted-foreground) / <alpha-value>)",
                },
                accent: {
                    DEFAULT: "hsl(var(--accent) / <alpha-value>)",
                    foreground: "hsl(var(--accent-foreground) / <alpha-value>)",
                },
            },
            borderRadius: {
                lg: "var(--radius)",
                md: "calc(var(--radius) - 2px)",
                sm: "calc(var(--radius) - 4px)",
            },
            animation: {
                fadeIn: "fadeIn 0.6s ease-out",
                slideUp: "slideUp 0.8s ease-out",
                fadeInUp: "fadeInUp 0.6s ease-out backwards",
                "fade-in-up": "fadeInUp .45s ease both",
                "row-slide-in": "rowSlideIn .35s ease both",
                shimmer: "shimmer 1.4s infinite",
                "pulse-ring": "pulse-ring 2s ease infinite",
                modalIn:
                    "modalIn .28s cubic-bezier(.34, 1.56, .64, 1) forwards",
                overlayIn: "overlayIn .2s ease forwards",
                shake: "shake .35s ease",
            },
            keyframes: {
                fadeIn: {
                    "0%": { opacity: "0" },
                    "100%": { opacity: "1" },
                },
                slideUp: {
                    "0%": { opacity: "0", transform: "translateY(30px)" },
                    "100%": { opacity: "1", transform: "translateY(0)" },
                },
                fadeInUp: {
                    "0%": { opacity: "0", transform: "translateY(12px)" },
                    "100%": { opacity: "1", transform: "translateY(0)" },
                },
                "pulse-ring": {
                    "0%": { boxShadow: "0 0 0 0 rgba(16, 185, 129, 0.4)" },
                    "70%": { boxShadow: "0 0 0 10px rgba(16, 185, 129, 0)" },
                    "100%": { boxShadow: "0 0 0 0 rgba(16, 185, 129, 0)" },
                },
                modalIn: {
                    "0%": {
                        opacity: "0",
                        transform: "scale(.94) translateY(10px)",
                    },
                    "100%": {
                        opacity: "1",
                        transform: "scale(1) translateY(0)",
                    },
                },
                overlayIn: {
                    "0%": { opacity: "0" },
                    "100%": { opacity: "1" },
                },
                shimmer: {
                    "0%": { backgroundPosition: "-200% 0" },
                    "100%": { backgroundPosition: "200% 0" },
                },
                rowSlideIn: {
                    "0%": { opacity: "0", transform: "translateX(-8px)" },
                    "100%": { opacity: "1", transform: "translateX(0)" },
                },
                shake: {
                    "0%, 100%": { transform: "translateX(0)" },
                    "20%, 60%": { transform: "translateX(-5px)" },
                    "40%, 80%": { transform: "translateX(5px)" },
                },
            },
        },
    },

    plugins: [forms],
};
