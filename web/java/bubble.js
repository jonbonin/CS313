            function bubbleChart(table) {
                var trace1 = {
                    x: getArrayValue(table, 'x'),
                    y: getArrayValue(table, 'y'),
                    mode: 'markers',
                    marker: {
                        size: getArrayValue(table, 'z')
                    }
                };

                var data = [trace1];

                var layout = {
                    title: 'Marker Size',
                    showlegend: false,
                    height: 600,
                    width: 600
                };

                Plotly.newPlot('myDiv', data, layout);
            }
            
            function getArrayValue(table, coord) {
                var table2 = table;
                console.log(table2.length);
                var i;
                var r = 0;
                var item = [];
                if(coord == 'x'){
                    i = 2;
                }else if(coord == 'y'){
                    i = 1;
                }else if (coord == 'z'){
                    i = 0;
                }
                console.log(table.length);
                do{
                    item[r] = table[r][i];
                    r++;
                }while (table[r][i] !== null && table[r][i] !== undefined)
                return item;

            }