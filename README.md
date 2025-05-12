# タスク管理SPA（Vue3 + Laravel API構成）

## 📌 概要

このアプリは、Vue3（TypeScript）で構築されたフロントエンドと、Laravel API（Sanctum認証）によるバックエンドで構成されたシングルページアプリケーション（SPA）です。

- 認証機能（ログイン／ログアウト）
- タスクの一覧表示、作成、削除
- セッション維持／CORS対応済
- Vercel（Vue） × Render（Laravel）で無料デプロイ

---

## 🚀 アクセスURL（デモ）

- フロントエンド（Vue）  
  👉 https://your-vercel-url.vercel.app/app/

- バックエンドAPI（Laravel）  
  👉 https://your-render-url.onrender.com

---

## 🛠 技術スタック

| 種類 | 技術 |
|------|------|
| フロントエンド | Vue3, TypeScript, Vite, Axios, Pinia |
| バックエンド | Laravel 12, Sanctum, MySQL |
| デプロイ | Vercel（フロント）, Render（API） |
| DB | PlanetScale（MySQL互換） |

---

## 🔐 認証とセキュリティ

- Laravel Sanctum によるセッションベース認証
- CORS / SameSite=None + Secure Cookie 対応済み
- クロスドメイン構成でもセッション維持OK（実績あり）

---

## 📁 ディレクトリ構成（概要）

```bash
laravel-api-full/
├── public/
│   └── app/        # Vueビルド済み成果物配置
├── routes/api.php
├── app/Http/Controllers/
└── ...
