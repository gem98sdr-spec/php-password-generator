# Secure Password Generator 🔐

A lightweight, single-file PHP script to generate cryptographically secure passwords. It includes a clean web interface and a built-in JSON API for developers.

## Features
- **Zero Dependencies:** Written in pure PHP, no external libraries required.
- **Cryptographically Secure:** Uses PHP's `random_int()` for true randomness.
- **API Ready:** Fetch passwords programmatically via JSON response.
- **XSS Protected:** Inputs are filtered and outputs are strictly sanitized.
- **Responsive UI:** Clean, modern, and minimal web interface.

## Usage

Upload `passgenerator.php` to your PHP server (e.g., Apache, Nginx).

### 1. Web Interface
Navigate to the file in your browser to generate a password instantly. You can customize the length by changing the URL parameter:
`http://your-domain.com/passgenerator.php?length=24`

### 2. JSON API
You can use this tool as a RESTful API by passing the `api=true` parameter.

**Request:**
`GET /passgenerator.php?api=true&length=20`

**Response:**
{
  "password": "H4@x9(mP!qLz&vB1w$K7",
  "length": 20
}

## Security
This script prevents XSS attacks by escaping output using `htmlspecialchars` and disables MIME-sniffing and clickjacking via HTTP headers.
