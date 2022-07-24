const defaultTheme = require('tailwindcss/defaultTheme');
const plugin = require('tailwindcss/plugin');


module.exports = {
    theme: {
        extend: {
            fontFamily: {
                sans: ['Inter var', ...defaultTheme.fontFamily.sans],
            },
        },
    },
    variants: {
        extend: {
            backgroundColor: ['active', 'hover'],
        }
    },
    purge: {
        content: [
            './app/**/*.php',
            './resources/**/*.html',
            './resources/**/*.js',
            './resources/**/*.jsx',
            './resources/**/*.ts',
            './resources/**/*.tsx',
            './resources/**/*.php',
            './resources/**/*.vue',
            './resources/**/*.twig',
        ],
        options: {
            defaultExtractor: (content) => content.match(/[\w-/.:]+(?<!:)/g) || [],
            whitelistPatterns: [/-active$/, /-enter$/, /-leave-to$/, /show$/],
        },
    },
    plugins: [
        plugin(function ({ addUtilities, addComponents, e, prefix, config }) {
            // Add your custom styles here
            addUtilities({
                ".rotate-y-180": {
                    transform: "rotateY(180deg)"
                },
                ".preserve-3d": {
                    transformStyle: "preserve-3d"
                },
                ".backface-hidden": {
                    backfaceVisibility: "hidden"
                }
            })
        }),
        require('@tailwindcss/forms'),
        require('@tailwindcss/typography'),
    ],
};
