# Gemini Optimizer Patched

Zaawansowany optymalizator PHP integrujący się z API Google Gemini do analizy i optymalizacji kodu.

## 📋 Opis

`gemini-optimizer-patched` to narzędzie PHP zaprojektowane do automatycznego analizowania, optymalizowania i ulepszania jakości kodu PHP przy użyciu potencjału sztucznej inteligencji Google Gemini. Projekt zawiera poprawki i ulepszenia originalne wersji.

## ✨ Główne Funkcje

- 🤖 **Integracja z Google Gemini AI** - Wykorzystanie zaawansowanych modeli AI do analizy kodu
- 🔍 **Analiza Kodu** - Automatyczne skanowanie i identyfikacja problemów w kodzie PHP
- ⚡ **Optymalizacja Wydajności** - Sugestie dotyczące optymalizacji i refaktoringu
- 🐛 **Detekcja Błędów** - Wykrywanie potencjalnych błędów i słabych miejsc
- 📊 **Raporty Szczegółowe** - Generowanie raportów z rekomendacjami
- 🔧 **Łatwa Konfiguracja** - Prosta konfiguracja i użycie

## 📦 Wymagania

- PHP >= 7.4
- Composer (opcjonalnie, ale zalecane)
- Klucz API Google Gemini

## 🚀 Instalacja

### Opcja 1: Za pomocą Composer

```bash
composer require norbertsiedlecki-prog/gemini-optimizer-patched
```

### Opcja 2: Manualna instalacja

1. Klonuj repozytorium:
```bash
git clone https://github.com/norbertsiedlecki-prog/gemini-optimizer-patched.git
cd gemini-optimizer-patched
```

2. Zainstaluj zależności (jeśli są):
```bash
composer install
```

## 📖 Użycie

### Podstawowy Przykład

```php
<?php
require 'vendor/autoload.php';

use GeminiOptimizer\Optimizer;

// Inicjalizacja optymalizatora
$optimizer = new Optimizer([
    'api_key' => 'YOUR_GEMINI_API_KEY'
]);

// Analiza pliku PHP
$result = $optimizer->analyzeFile('path/to/your/file.php');

// Wyświetlenie wyników
echo $result->getReport();
```

### Analiza Kodu Bezpośrednio

```php
$code = '
<?php
function calculateSum($a, $b) {
    $result = 0;
    $result = $a + $b;
    return $result;
}
?>';

$analysis = $optimizer->analyzeCode($code);
$suggestions = $analysis->getSuggestions();

foreach ($suggestions as $suggestion) {
    echo $suggestion->getMessage() . "\n";
}
```

## ⚙️ Konfiguracja

### Zmienne Środowiskowe

Utwórz plik `.env`:

```env
GEMINI_API_KEY=your_api_key_here
GEMINI_MODEL=gemini-2.0-flash
ANALYSIS_LEVEL=full
```

### Plik Konfiguracyjny

```php
$config = [
    'api_key' => $_ENV['GEMINI_API_KEY'],
    'model' => 'gemini-2.0-flash',
    'analysis_level' => 'full', // full, basic, performance
    'timeout' => 30,
    'cache_enabled' => true
];

$optimizer = new Optimizer($config);
```

## 🔑 Uzyskanie Klucza API

1. Przejdź na https://ai.google.dev/
2. Zaloguj się do swojego konta Google
3. Utwórz nowy projekt
4. Wygeneruj klucz API
5. Skopiuj klucz do pliku `.env`

## 🤝 Współpraca

Zapraszamy do udziału w projekcie! Jeśli chcesz wnieść swój wkład:

1. **Fork** repozytorium
2. Stwórz gałąź `feature/twoja-funkcja` (`git checkout -b feature/twoja-funkcja`)
3. Zcommituj zmiany (`git commit -m 'Dodaj nową funkcję'`)
4. Wypchnij do gałęzi (`git push origin feature/twoja-funkcja`)
5. Otwórz **Pull Request**

## 📝 Licencja

Ten projekt jest dostępny na licencji MIT. Szczegóły znajdują się w pliku [LICENSE](LICENSE).

## 💬 Wsparcie

Masz pytania lub napotkałeś problem? Otwórz **Issue** w repozytorium:
[https://github.com/norbertsiedlecki-prog/gemini-optimizer-patched/issues](https://github.com/norbertsiedlecki-prog/gemini-optimizer-patched/issues)

## 📚 Dodatkowe Zasoby

- [Dokumentacja Google Gemini API](https://ai.google.dev/docs)
- [Dokumentacja PHP](https://www.php.net/manual/)
- [Best Practices PHP](https://www.php-fig.org/)

---

**Autor:** [norbertsiedlecki-prog](https://github.com/norbertsiedlecki-prog)  
**Data Ostatniej Aktualizacji:** 2026-04-24
