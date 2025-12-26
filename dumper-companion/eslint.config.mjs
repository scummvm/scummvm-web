import eslint from '@eslint/js';
import { defineConfig } from 'eslint/config';
import preact from 'eslint-config-preact';
import globals from 'globals';
import stylistic from '@stylistic/eslint-plugin';
import tseslint from 'typescript-eslint';

export default defineConfig(
    eslint.configs.recommended,
    preact,
    {
        name: "global ignores",
        ignores: ["node_modules", "index.js"],
    },
    {
        name: "global settings",
        languageOptions: {
            ecmaVersion: "latest",
            sourceType: "module",
        },

        plugins: {
            "@stylistic": stylistic,
        },

        rules: {
            "@stylistic/indent": ["error", 4, { "SwitchCase": 0 }],
            "@stylistic/semi": ["error", "always"],
        },
    },
    {
        name: "webpack specific",
        files: ["webpack.config.js"],
        languageOptions: {
            globals: {
                ...globals.node,
            },
        },
    },
    {
        name: "browser specific",
        files: ["src/**"],
        languageOptions: {
            globals: {
                ...globals.browser,
            },
        },
    },
    {
        name: "typescript specific",
        files: ["**/*.ts", "**/*.tsx"],

        extends: [tseslint.configs.recommendedTypeChecked],
        languageOptions: {
            parserOptions: {
                projectService: true,
                jsxPragma: null,
            },
        },
    },
);
