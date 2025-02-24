import globals from "globals";
import pluginJs from "@eslint/js";
import tseslint from "@typescript-eslint/eslint-plugin";
import pluginVue from "eslint-plugin-vue";

/** @type {import('eslint').Linter.Config[]} */
export default [
  { 
    files: ["**/*.{js,ts,vue}"]
  },
  { 
    languageOptions: { globals: globals.browser } 
  },
  pluginJs.configs.recommended,
  ...tseslint.configs.recommended,
  ...pluginVue.configs["flat/essential"],
  { 
    files: ["**/*.vue"], 
    languageOptions: { parserOptions: { parser: tseslint.parser } } 
  },
  { 
    ignores: [".nuxt", "node_modules", "dist"] 
  }
];
