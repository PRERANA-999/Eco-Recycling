<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title></title>
</head>
<body>
  <select id="wasteTypes" multiple>
    <option value="plastic">Plastic</option>
    <option value="paper">Paper</option>
    <option value="metal">Metal</option>
    <option value="glass">Glass</option>
  </select>

  <textarea type="text" id="pointsTextbox" readonly ></textarea>

  <div>
    <input type="text" name="pointsContainer" id="pointsContainer" readonly value="0">
  </div>

  <h3>Enter quantity:</h3>
  <div>
    <input type="text" name="quantityContainer" id="quantityContainer" readonly>
  </div>
  <select id="wasteTypes1" multiple>
    <option value="plastic1"></option>
    <option value="paper1">Paper</option>
    <option value="metal1">Metal</option>
    <option value="glass1">Glass</option>
  </select>

  <textarea type="text" id="pointsTextbox1" readonly ></textarea>

  <div>
    <input type="text" name="pointsContainer1" id="pointsContainer1" readonly value="0">
  </div>

  <h3>Enter quantity:</h3>
  <div>
    <input type="text" name="quantityContainer1" id="quantityContainer1" readonly>
  </div>

  <script type="text/javascript">
  document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('wasteTypes').addEventListener('change', displayPoints);

    function displayPoints() {
      var selectedOptions = Array.from(document.getElementById('wasteTypes').selectedOptions);
      var pointsTextbox = document.getElementById('pointsTextbox');
      var quantityContainer = document.getElementById('quantityContainer');
      var pointsContainer = document.getElementById('pointsContainer');

      pointsTextbox.value = '';
      quantityContainer.value = '';
      pointsContainer.value = '0';

      var quantities = [];

      function displaySelectedPoints() {
        var currentIndex = 0;
        var totalPoints = 0;

        function displayNextPoint() {
          if (currentIndex < selectedOptions.length) {
            var wasteType = selectedOptions[currentIndex].value;
            var points = getPointsForWasteType(wasteType);
            var quantity = quantities[currentIndex] || 0;

            pointsTextbox.value += wasteType + ': ' + points + ' points\n';

            if (quantity === 0) {
              currentIndex++;
              displayNextPoint();
              return;
            }

            var calculatedPoints = points * quantity;
            var existingPointsElement = document.getElementById(wasteType + 'Points');

            if (existingPointsElement) {
              existingPointsElement.textContent = calculatedPoints;
            } else {
              var newPointsElement = document.createElement('p');
              newPointsElement.id = wasteType + 'Points';
              newPointsElement.textContent = calculatedPoints;
              pointsContainer.appendChild(newPointsElement);
            }

            totalPoints += calculatedPoints;
            currentIndex++;
            displayNextPoint();
          } else {
            quantityContainer.value = quantities.join(', ');
            pointsContainer.value = totalPoints;
          }
        }

        displayNextPoint();
      }

      for (var i = 0; i < selectedOptions.length; i++) {
        var wasteType = selectedOptions[i].value;
        var quantity = prompt('Enter quantity for ' + wasteType + ':');
        quantities.push(parseInt(quantity) || 0);
      }

      displaySelectedPoints();
    }

    function updatePoints(event) {
      var wasteType = event.target.dataset.wasteType;
      var quantity = parseInt(event.target.value);
      var points = getPointsForWasteType(wasteType);
      var calculatedPoints = points * quantity;
      var pointsContainer = document.getElementById('pointsContainer');

      var existingPointsElement = document.getElementById(wasteType + 'Points');
      if (existingPointsElement) {
        existingPointsElement.textContent = calculatedPoints;
      } else {
        var newPointsElement = document.createElement('p');
        newPointsElement.id = wasteType + 'Points';
        newPointsElement.textContent = calculatedPoints;
        pointsContainer.appendChild(newPointsElement);
      }

      var pointsElements = Array.from(pointsContainer.getElementsByTagName('p'));
      var pointsValues = pointsElements.map(function(element) {
        return parseInt(element.textContent);
      });
      var totalPoints = pointsValues.reduce(function(acc, val) {
        return acc + val;
      }, 0);
      pointsContainer.value = totalPoints;

      if (isNaN(quantity) || event.target.value.trim() === '') {
        pointsContainer.value = '0';
      }

      var quantityInputs = Array.from(document.getElementById('quantityContainer').parentNode.querySelectorAll('input[type="number"]'));
      var quantities = quantityInputs.map(function(input) {
        return input.value;
      });
      document.getElementById('quantityContainer').value = quantities.join(', ');
    }

    function getPointsForWasteType(wasteType) {
      var pointsMap = {
        plastic: 5,
        paper: 3,
        metal: 7,
        glass: 2
      };
      return pointsMap[wasteType] || 0;
    }
  });
</script>

</body>
</html>