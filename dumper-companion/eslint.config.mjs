import eslint from '@eslint/js';
import globals from "globals";
import { defineConfig } from 'eslint/config';
import stylistic from '@stylistic/eslint-plugin';
import tseslint from 'typescript-eslint';

export default defineConfig(
    eslint.configs.recommended,
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
            "no-constant-condition": "off",
            "no-sparse-arrays": "off",
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

	extends: [tseslint.configs.recommended],

        rules: {
            "@typescript-eslint/no-empty-object-type": "off",
            "@typescript-eslint/no-unsafe-function-type": "error",
            "@typescript-eslint/no-wrapper-object-types": "error",
        },
     });
