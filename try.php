<?php
// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $rangeStart = $_POST['range_start'] ?? '';
    $rangeEnd = $_POST['range_end'] ?? '';
    $defaultGateway = $_POST['default_gateway'] ?? '';
    $dnsServer = $_POST['dns_server'] ?? '';
    $leaseTime = $_POST['lease_time'] ?? '';
    $excludedAddresses = $_POST['excluded_addresses'] ?? [];

    // Generate router configuration commands
    $configCommands = [];
    $configCommands[] = "ip dhcp pool LAN_POOL";
    $configCommands[] = "   network $rangeStart $rangeEnd";
    $configCommands[] = "   default-router $defaultGateway";
    $configCommands[] = "   dns-server $dnsServer";
    $configCommands[] = "   lease $leaseTime";

    // Add excluded addresses
    foreach ($excludedAddresses as $excluded) {
        $configCommands[] = "ip dhcp excluded-address $excluded";
    }

    // Output the configuration commands
    echo "<h2>Generated DHCP Configuration</h2>";
    echo "<pre>" . htmlspecialchars(implode("\n", $configCommands)) . "</pre>";
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Router DHCP Configuration</title>

  <script>
    function addExcludedAddress() {
      const excludedContainer = document.getElementById('excluded-container');
      const input = document.createElement('input');
      input.type = 'text';
      input.name = 'excluded_addresses[]';
      input.placeholder = 'e.g., 192.168.1.50';
      excludedContainer.appendChild(input);
    }
  </script>
</head>
<body>
  <div class="container">
    <h2>Router DHCP Configuration</h2>
    
  </div>
</body>
</html>
