            function bubbleChart(table) {
                console.log(table.length);
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
                    title: 'Product Size',
                    showlegend: false,
                    height: 700,
                    width: 700
                };

                Plotly.newPlot('myDiv', data, layout);
            }
            
            function getArrayValue(table, coord) {
//                var table2 = table;
                console.log(table.length);
                console.log(table);
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
                console.log(table);
                console.log("bdo of i " + i);
                console.log("bdo of r " + r);
                
                for(var r = 0; r < table.length; r++){
                console.log("indo of i " + i);
                console.log("indo of r " + r);
                console.log("indo table " + table);
                    item[r] = table[r][i];
                console.log("indo item " + item);
                }
                    
                return item;
            }