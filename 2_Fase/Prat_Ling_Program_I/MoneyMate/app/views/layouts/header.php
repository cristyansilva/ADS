<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MoneyMate</title>
    <link rel="icon" href="logo.png" type="image/png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --sidebar-bg: #ffffff;
            --sidebar-border: #e5e7eb;
            --body-bg: #f9fafb; /* Cinza bem claro */
            --text-primary: #111827;
            --text-secondary: #6b7280;
            --primary-color: #0f172a; /* Azul/Preto moderno */
            --card-border: #f3f4f6;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--body-bg);
            color: var(--text-primary);
            display: flex;
            min-height: 100vh;
            overflow-x: hidden;
        }

        .wrapper {
            display: flex;
            width: 100%;
        }

        /* Sidebar Customizada */
        #sidebar {
            width: 260px;
            background: var(--sidebar-bg);
            border-right: 1px solid var(--sidebar-border);
            display: flex;
            flex-direction: column;
            position: fixed;
            height: 100vh;
            z-index: 1000;
            transition: all 0.3s;
        }

        /* Links do Menu */
        .nav-link {
            color: var(--text-secondary);
            font-weight: 500;
            padding: 0.75rem 1rem;
            margin: 0.25rem 1rem;
            border-radius: 0.5rem;
            transition: all 0.2s;
            display: flex;
            align-items: center;
        }
        
        .nav-link i { width: 24px; text-align: center; margin-right: 10px; }
        
        .nav-link:hover {
            background-color: #f3f4f6;
            color: var(--text-primary);
        }
        
        .nav-link.active {
            background-color: #f3f4f6;
            color: var(--primary-color);
            font-weight: 600;
        }

        /* Conteúdo Principal */
        #content {
            width: 100%;
            margin-left: 260px; /* Espaço da Sidebar */
            padding: 2rem;
        }

        /* Cards Modernos */
        .card {
            border: 1px solid #e5e7eb;
            border-radius: 12px;
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.05);
            background: #fff;
            margin-bottom: 1.5rem;
        }
        
        .card-header {
            background: transparent;
            border-bottom: 1px solid #f3f4f6;
            padding: 1.25rem;
            font-weight: 600;
            font-size: 1.1rem;
        }

        .card-body { padding: 1.5rem; }

        /* Botões */
        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }
        .btn-primary:hover {
            background-color: #1e293b;
        }
        
        /* Avatar Circle */
        .avatar-circle {
            width: 40px; height: 40px;
            background-color: #10b981; /* Verde do exemplo */
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
        }
    </style>
</head>
<body>