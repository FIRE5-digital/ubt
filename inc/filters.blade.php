                    <script>
                            
                        function filterRows(e){
                            e.preventDefault();
                             

                            $fuel = document.querySelector('[name=fuel-type]').value;
                            $transmission = document.querySelector('[name=transmission]').value;
                            $spec = document.querySelector('[name=spec]').value;

                            $select = '.model-table-row';
                            $select += $fuel=="" ? '' : '[data-fuel~="'+$fuel+'"]';
                            $select += $transmission=="" ? '' : '[data-transmission~="'+$transmission+'"]';
                            $select += $spec== "" ? '' : '[data-spec="'+$spec.toLowerCase()+'"]';
                            //$select += $keywords== "" ? '' : '[data-name*="'+$keywords.toLowerCase()+'"]';
                            console.log($select);
                            
                            if($select == '.model-table-row'){
                                document.querySelectorAll('.model-table-row').forEach(function(el) {
                                  el.classList.remove('hidden');
                                });
                                return;
                            }

                            document.querySelectorAll('.model-table-row').forEach(function(el) {
                                el.classList.add('hidden');
                            });
                            document.querySelectorAll($select).forEach(function(el) {
                                el.classList.remove('hidden');
                            });

                            
                        }

                        document.querySelectorAll('.row-filter').forEach(function(filter) {
                            filter.addEventListener("change", filterRows);
                        });



                        document.querySelectorAll('.term-filter').forEach(function(filter){
                            filter.addEventListener("change", function(e){
                                e.preventDefault();
                                    
                                $data = this.value;

                                if($data==''){
                                    $select = '.price-from';
                                } else {
                                    $select = '.price-'+$data;
                                }


                                document.querySelectorAll('.term-list span').forEach(function(el) {
                                    el.classList.add('hidden');
                                    el.classList.remove('show');
                                });
                                document.querySelectorAll($select).forEach(function(el) {
                                    el.classList.remove('hidden');
                                    el.classList.add('show');
                                });

                                // Adjust links
                                document.querySelectorAll('.model-table-row a').forEach(function(el) {
                                    @php($url=parse_url(url()->full()))
                                    var url = new URL('{{ $url['scheme'].'://'.$url['host'] }}'+el.getAttribute('href'));
                                    url.searchParams.set('term', $data);
                                    
                                    el.setAttribute('href',url.pathname+url.search);
                                });

                                //$dropdown_button.click();
                            });
                        });

                    </script>