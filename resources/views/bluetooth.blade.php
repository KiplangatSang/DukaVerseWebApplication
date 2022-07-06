<!DOCTYPE html>
<html lang="en">

<head>
				<meta charset="UTF-8" />
				<meta http-equiv="X-UA-Compatible" content="IE=edge" />
				<meta name="viewport" content="width=device-width, initial-scale=1.0" />
				<title>Document</title>
</head>

<body>
				<button id="getDetails">Get device details</button>
				<div id="details"></div>

				<script type="text/javascript">
				    const button = document.getElementById("getDetails");
				    const details = document.getElementById("details");
				    button.addEventListener("click", async () => {
				        try {

				            const device = await navigator.bluetooth.requestDevice({
				                optionalServices: ["battery_service", "device_information"],
				                acceptAllDevices: true,
				            });

				            // Connect to the GATT server
				            // We also get the name of the Bluetooth device here
				            let deviceName = device.gatt.device.name;
				            const server = await device.gatt.connect();

				            // Getting the services we mentioned before through GATT server
				            const batteryService = await server.getPrimaryService("battery_service");
				            const infoService = await server.getPrimaryService("device_information");

				            // Getting device information
				            // We will get all characteristics from device_information
				            const infoCharacteristics = await infoService.getCharacteristics();
				            console.log(infoCharacteristics);
				            let infoValues = [];
				            const promise = new Promise((resolve, reject) => {
				                infoCharacteristics.forEach(async (characteristic, index, array) => {
				                    // Returns a buffer
				                    const value = await characteristic.readValue();
				                    console.log(new TextDecoder().decode(value));
				                    // Convert the buffer to string
				                    infoValues.push(new TextDecoder().decode(value));
				                    if (index === array.length - 1) resolve();
				                });
				            });

				            promise.then(() => {
				                // Display all the information on the screen
				                // use innerHTML
				                details.innerHTML = `
    Device Name - ${deviceName}<br />
    Battery Level - ${batteryPercent}%<br />
    Device Information:
    <ul>
      ${infoValues.map((value) => `<li>${value}</li>`).join("")}
    </ul>
  `;
				            });

				        } catch (err) {
				            console.error(err);
				            alert("An error occured while fetching device details");
				        }
				    });
				</script>
</body>

</html>