// Tailwind v4 reads this legacy theme extension via @config in resources/css/app.css.
// Keep the original portfolio typography while progressively migrating styles.
export default {
    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', 'ui-sans-serif', 'system-ui', 'sans-serif'],
            },
        },
    },
};
