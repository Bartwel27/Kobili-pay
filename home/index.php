<?php
require "../login/login.php";

if (!isset($_SESSION["username"]) && !isset($_SESSION["email"]) && !isset($_SESSION["userId"])) {
	_innerjs("undefined session");
	_http_res(0,"../index.html");
} else {

$username = $_SESSION["username"];
$email = $_SESSION["email"];
$userid = $_SESSION["userId"];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$username?></title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/styles.css">
    <style>
        :root {
            --primary-color: #064d67be;
            --secondary-color: #1d6ae7;
            --accent-color: #197be3;
            --background: #7cd6e6;
            --card-bg: #0a99b9;
            --text-primary: #dde2ea;
            --text-secondary: #e8ecf1;
            --success: #27ec0c;
            --danger: #d70909;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Inter', sans-serif;
        }

        body {
            background-color: var(--background);
            min-height: 100vh;
        }

        .dashboard {
            display: grid;
            grid-template-columns: 250px 1fr;
            min-height: 100vh;
        }

        /* Sidebar Styles */
        .sidebar {
            background-color: var(--card-bg);
            padding: 2rem;
            border-right: 1px solid #e2e8f0;
        }

        .logo {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--primary-color);
            margin-bottom: 2rem;
        }

        .nav-menu {
            list-style: none;
        }

        .nav-item {
            margin-bottom: 0.5rem;
        }

        .nav-link {
            display: flex;
            align-items: center;
            padding: 0.75rem 1rem;
            color: var(--text-secondary);
            text-decoration: none;
            border-radius: 0.5rem;
            transition: all 0.3s ease;
        }

        .nav-link:hover {
            background-color: var(--background);
            color: var(--primary-color);
        }

        .nav-link.active {
            background-color: var(--primary-color);
            color: white;
        }

        /* Main Content Styles */
        .main-content {
            padding: 2rem;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
        }

        .balance-cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .balance-card {
            background: var(--card-bg);
            padding: 1.5rem;
            border-radius: 1rem;
            box-shadow: 0 4px 6px -1px rgba(59, 58, 58, 0.1);
        }

        .balance-card h3 {
            color: var(--text-secondary);
            font-size: 0.875rem;
            margin-bottom: 0.5rem;
        }

        .balance-amount {
            font-size: 2rem;
            font-weight: 700;
            color: var(--text-primary);
        }

        .quick-actions {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1rem;
            margin-bottom: 2rem;
        }

        .action-button {
            background-color: var(--card-bg);
            border: 1px solid #e2e8f0;
            border-radius: 1rem;
            padding: 1.5rem;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 0.5rem;
        }

        .action-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 15px -3px rgba(61, 60, 60, 0.1);
            border-color: var(--primary-color);
        }

        .action-icon {
            width: 48px;
            height: 48px;
            background-color: var(--background);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
        }

        .transactions {
            background-color: var(--card-bg);
            border-radius: 1rem;
            padding: 1.5rem;
        }

        .transactions-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
        }

        .transaction-filters {
            display: flex;
            gap: 1rem;
        }

        .filter-button {
            padding: 0.5rem 1rem;
            border: 1px solid #e2e8f0;
            border-radius: 0.5rem;
            background: var(--card-bg);
            color: var(--text-secondary);
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .filter-button:hover {
            border-color: var(--primary-color);
            color: var(--primary-color);
        }

        .transaction-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem;
            border-bottom: 1px solid #e2e8f0;
        }

        .transaction-info {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .transaction-icon {
            width: 40px;
            height: 40px;
            background-color: var(--background);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .transaction-details h4 {
            color: var(--text-primary);
            margin-bottom: 0.25rem;
        }

        .transaction-details p {
            color: var(--text-secondary);
            font-size: 0.875rem;
        }

        .transaction-amount {
            font-weight: 600;
        }

        .amount-positive {
            color: var(--success);
        }

        .amount-negative {
            color: var(--danger);
        }

        .search-bar {
            display: flex;
            align-items: center;
            background-color: var(--card-bg);
            border: 1px solid #e2e8f0;
            border-radius: 0.5rem;
            padding: 0.5rem 1rem;
            width: 300px;
        }

        .search-bar input {
            border: none;
            outline: none;
            background: none;
            width: 100%;
            padding: 0.5rem;
        }

        .notification-badge {
            background-color: var(--danger);
            color: white;
            padding: 0.25rem 0.5rem;
            border-radius: 999px;
            font-size: 0.75rem;
        }

        @media (max-width: 768px) {
            .dashboard {
                grid-template-columns: 1fr;
            }

            .sidebar {
                display: none;
            }

            .balance-cards {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <div class="dashboard">
        <!-- Sidebar -->
        <div class="sidebar">
            <div class="logo">KOBILI</div>
            <nav>
                <ul class="nav-menu">
                    <li class="nav-item">
                        <a href="#" class="nav-link active">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a href="transactions.html" class="nav-link">Transactions</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">Cards</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">Recipients</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">Settings</a>
                    </li>
                </ul>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="main-content">
            <div class="header">
                <div class="search-bar">
                    <input type="text" placeholder="Search transactions...">
                </div>
                <div class="notification-badge">2</div>
            </div>

            <!-- Balance Cards -->
            <div class="balance-cards">
                <div class="balance-card">
                    <h3>Total Balance</h3>
                    <div class="balance-amount">K24,562.00</div>
                </div>
                <div class="balance-card">
                    <h3>Monthly Income</h3>
                    <div class="balance-amount">K8,350.00</div>
                </div>
                <div class="balance-card">
                    <h3>Monthly Expenses</h3>
                    <div class="balance-amount">K5,350.00</div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="quick-actions">
                <button class="action-button">
                    <div class="action-icon">💸</div>
                    <h3>Send Money</h3>
                    <p>Transfer to anyone</p>
                </button>
                <button class="action-button">
                    <div class="action-icon">📃</div>
                    <h3>Pay Bills</h3>
                    <p>Pay your utilities</p>
                </button>
                <button class="action-button">
                    <div class="action-icon">💳</div>
                    <h3>Cards</h3>
                    <p>Manage cards</p>
                </button>
                <button class="action-button">
                    <div class="action-icon">📊</div>
                    <h3>Analytics</h3>
                    <p>View reports</p>
                </button>
            </div>

            <!-- Transactions -->
            <div class="transactions">
                <div class="transactions-header">
                    <h2>Recent Transactions</h2>
                    <div class="transaction-filters">
                        <button class="filter-button">All</button>
                        <button class="filter-button">Income</button>
                        <button class="filter-button">Expense</button>
                    </div>
                </div>

                <div class="transaction-item">
                    <div class="transaction-info">
                        <div class="transaction-icon">🏢</div>
                        <div class="transaction-details">
                            <h4>Office Rent</h4>
                            <p>5 Feb, 2025</p>
                        </div>
                    </div>
                    <div class="transaction-amount amount-negative">-K1,500.00</div>
                </div>

                <div class="transaction-item">
                    <div class="transaction-info">
                        <div class="transaction-icon">💰</div>
                        <div class="transaction-details">
                            <h4>Client Payment</h4>
                            <p>4 Feb, 2025</p>
                        </div>
                    </div>
                    <div class="transaction-amount amount-positive">+K3,200.00</div>
                </div>

                <div class="transaction-item">
                    <div class="transaction-info">
                        <div class="transaction-icon">🔋</div>
                        <div class="transaction-details">
                            <h4>NETFLIX Bills</h4>
                            <p>3 Feb, 2025</p>
                        </div>
                    </div>
                    <div class="transaction-amount amount-negative">-K250.00</div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Advanced Payment Dashboard</title>
        <style>
            /* [Previous styles remain the same until quick-actions] */
    
            .quick-actions {
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
                gap: 1rem;
                margin-bottom: 2rem;
            }
    
            /* New Cardless Withdrawal Modal Styles */
            .modal {
                display: none;
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background-color: rgba(224, 215, 215, 0.5);
                z-index: 1000;
                justify-content: center;
                align-items: center;
            }
    
            .modal.active {
                display: flex;
            }
    
            .modal-content {
                background-color: var(--card-bg);
                padding: 2rem;
                border-radius: 1rem;
                width: 90%;
                max-width: 500px;
                position: relative;
            }
    
            .close-modal {
                position: absolute;
                top: 1rem;
                right: 1rem;
                cursor: pointer;
                font-size: 1.5rem;
                color: var(--text-secondary);
            }
    
            .withdrawal-steps {
                display: flex;
                flex-direction: column;
                gap: 1.5rem;
                margin-top: 1.5rem;
            }
    
            .step {
                display: flex;
                gap: 1rem;
                align-items: flex-start;
            }
    
            .step-number {
                background-color: var(--primary-color);
                color: white;
                width: 24px;
                height: 24px;
                border-radius: 50%;
                display: flex;
                align-items: center;
                justify-content: center;
                flex-shrink: 0;
            }
    
            .withdrawal-code {
                background-color: var(--background);
                padding: 1.5rem;
                border-radius: 0.5rem;
                text-align: center;
                margin: 1.5rem 0;
            }
    
            .code-display {
                font-size: 2rem;
                font-weight: 700;
                color: var(--primary-color);
                letter-spacing: 0.5rem;
                margin: 1rem 0;
            }
    
            .code-timer {
                color: var(--danger);
                font-weight: 600;
            }
    
            .withdrawal-form {
                display: flex;
                flex-direction: column;
                gap: 1rem;
                margin-bottom: 1.5rem;
            }
    
            .form-group {
                display: flex;
                flex-direction: column;
                gap: 0.5rem;
            }
    
            .form-group label {
                color: var(--text-secondary);
                font-size: 0.875rem;
            }
    
            .form-group input, .form-group select {
                padding: 0.75rem;
                border: 1px solid #e2e8f0;
                border-radius: 0.5rem;
                outline: none;
            }
    
            .form-group input:focus, .form-group select:focus {
                border-color: var(--primary-color);
            }
    
            .generate-btn {
                background-color: var(--primary-color);
                color: white;
                padding: 1rem;
                border: none;
                border-radius: 0.5rem;
                cursor: pointer;
                font-weight: 600;
                transition: background-color 0.3s ease;
            }
    
            .generate-btn:hover {
                background-color: var(--secondary-color);
            }
    
            /* [Rest of the previous styles remain the same] */
        </style>
    </head>
    <body>
        <!-- [Previous dashboard content remains the same until quick-actions] -->
        <div class="quick-actions">
            <button class="action-button" onclick="openWithdrawalModal()">
                <div class="action-icon">🏧</div>
                <h3>Cardless Withdrawal</h3>
                <p>Withdraw without card</p>
            </button>
            <!-- [Other action buttons remain the same] -->
        </div>
    
        <!-- Cardless Withdrawal Modal -->
        <div class="modal" id="withdrawalModal">
            <div class="modal-content">
                <span class="close-modal" onclick="closeWithdrawalModal()">&times;</span>
                <h2>Cardless ATM Withdrawal</h2>
                
                <div class="withdrawal-form">
                    <div class="form-group">
                        <label>Select Account</label>
                        <select>
                            <option>Savings Account (**** 1234)</option>
                            <option>Checking Account (**** 5678)</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Amount</label>
                        <input type="number" placeholder="Enter amount" min="3" max="300">
                    </div>
                    <button class="generate-btn" onclick="generateWithdrawalCode()">Generate Withdrawal Code</button>
                </div>
    
                <div id="codeSection" style="display: none;">
                    <div class="withdrawal-code">
                        <h3>Your Withdrawal Code</h3>
                        <div class="code-display" id="withdrawalCode">123456</div>
                        <div class="code-timer">Code expires in: <span id="timer">03:00</span></div>
                    </div>
    
                    <div class="withdrawal-steps">
                        <div class="step">
                            <div class="step-number">1</div>
                            <div class="step-content">
                                <h4>Visit any ATM</h4>
                                <p>Go to any of our ATMs within the next 3 minutes</p>
                            </div>
                        </div>
                        <div class="step">
                            <div class="step-number">2</div>
                            <div class="step-content">
                                <h4>Select Cardless Withdrawal</h4>
                                <p>Press the "Cardless Withdrawal" button on the ATM screen</p>
                            </div>
                        </div>
                        <div class="step">
                            <div class="step-number">3</div>
                            <div class="step-content">
                                <h4>Enter Code</h4>
                                <p>Enter the 6-digit code shown above</p>
                            </div>
                        </div>
                        <div class="step">
                            <div class="step-number">4</div>
                            <div class="step-content">
                                <h4>Collect Cash</h4>
                                <p>Collect your cash and receipt</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
        <script>
            function openWithdrawalModal() {
                document.getElementById('withdrawalModal').classList.add('active');
            }
    
            function closeWithdrawalModal() {
                document.getElementById('withdrawalModal').classList.remove('active');
                document.getElementById('codeSection').style.display = 'none';
            }
    
            function generateWithdrawalCode() {
                // Generate random 6-digit code
                const code = Math.floor(100000 + Math.random() * 900000);
                document.getElementById('withdrawalCode').textContent = code;
                document.getElementById('codeSection').style.display = 'block';
                
                // Start timer
                let timeLeft = 600; // 3 minutes in seconds
                const timerDisplay = document.getElementById('timer');
                
                const timer = setInterval(() => {
                    const minutes = Math.floor(timeLeft / 60);
                    const seconds = timeLeft % 60;
                    timerDisplay.textContent = `${minutes}:${seconds.toString().padStart(2, '0')}`;
                    
                    if (timeLeft <= 0) {
                        clearInterval(timer);
                        closeWithdrawalModal();
                    }
                    timeLeft--;
                }, 1000);
            }
        </script>
    </body>
    </html>   
    
<?php
} 
?>