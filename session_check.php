<?php
// Start session if not already started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

/**
 * Checks if the user is authenticated.
 *
 * @return bool True if authenticated, false otherwise.
 */
function isAuthenticated(): bool {
    return isset($_SESSION['user_id']);
}

/**
 * Checks if the authenticated user has a specific role or one of the allowed roles.
 *
 * @param string|array $roles A single role (string) or an array of allowed roles.
 * @return bool True if the user has the required role, false otherwise.
 */
function hasRole($roles): bool {
    if (!isAuthenticated() || !isset($_SESSION['role'])) {
        return false; // Not authenticated or role not set
    }

    if (is_string($roles)) {
        return $_SESSION['role'] === $roles;
    }

    if (is_array($roles)) {
        return in_array($_SESSION['role'], $roles, true);
    }

    return false; // Invalid $roles parameter
}

/**
 * Protects a page by checking authentication.
 * If not authenticated, redirects to login.php.
 *
 * Call this function at the top of pages that require login.
 */
function protectPage(): void {
    if (!isAuthenticated()) {
        // Store the intended destination in a session variable or pass as query param
        $redirect_url = 'login.php';
        if (!empty($_SERVER['REQUEST_URI'])) {
            // Prevent redirect loops if login.php itself includes this check by mistake
            if (basename($_SERVER['PHP_SELF']) !== 'login.php') {
                 $redirect_url .= '?redirect=' . urlencode($_SERVER['REQUEST_URI']);
            }
        }
        header("Location: $redirect_url");
        exit;
    }
}

/**
 * Protects a page based on user roles.
 * If the user does not have the required role, it can redirect or show an error.
 *
 * @param string|array $allowed_roles Role(s) allowed to access the page.
 * @param string|null $redirect_url_on_fail URL to redirect if role check fails. If null, shows "Access Denied".
 */
function protectPageByRole($allowed_roles, string $redirect_url_on_fail = null): void {
    protectPage(); // First ensure user is authenticated

    if (!hasRole($allowed_roles)) {
        if ($redirect_url_on_fail) {
            header("Location: $redirect_url_on_fail");
        } else {
            // You can create a dedicated 'unauthorized.php' page for a better user experience
            http_response_code(403); // Forbidden
            die("Access Denied. You do not have the required permissions to view this page.");
        }
        exit;
    }
}

// Example usage for a page that requires admin role:
// require_once 'session_check.php';
// protectPageByRole('admin'); 
// OR for multiple roles:
// protectPageByRole(['admin', 'teacher']);

// Example usage for a page that just requires login:
// require_once 'session_check.php';
// protectPage();

?>
