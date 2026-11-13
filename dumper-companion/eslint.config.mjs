import { defineConfig } from 'eslint/config';
import eslintJS from '@eslint/js';
import eslintReact from "@eslint-react/eslint-plugin";
import eslintTS from 'typescript-eslint';
import globals from 'globals';
import reactHooks from "eslint-plugin-react-hooks";
import stylistic from '@stylistic/eslint-plugin';

export default defineConfig(
    {
        name: "global ignores",
        ignores: ["node_modules", "dist"],
    },
    {
        name: "global settings",
        extends: [
            eslintJS.configs.recommended,
            eslintReact.configs.strict,
            eslintReact.configs["disable-conflict-eslint-plugin-react-hooks"],
            reactHooks.configs.flat.recommended,
        ],

        languageOptions: {
            ecmaVersion: "latest",
            sourceType: "module",
            parserOptions: {
                ecmaFeatures: { jsx: true },
            },
        },

        plugins: {
            "@stylistic": stylistic,
        },

        settings: {
            "react-x": {
                importSource: "preact",
            },
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

        extends: [
            eslintTS.configs.recommendedTypeChecked,
            eslintReact.configs["strict-type-checked"],
        ],
        languageOptions: {
            parserOptions: {
                projectService: true,
            },
        },
    },
);
